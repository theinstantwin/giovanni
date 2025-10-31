#!/bin/bash

# WordPress Block Validation Utility
# Validates WordPress block pattern files for:
# - JSON syntax in block comments
# - PHP syntax
# - WordPress block structure rules
# - Common formatting errors

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Global counters
TOTAL_FILES=0
FILES_WITH_ERRORS=0
TOTAL_ERRORS=0
VERBOSE=false

# Usage information
usage() {
    cat << EOF
Usage: $(basename "$0") [OPTIONS] FILE...

Validates WordPress block pattern files for JSON, PHP, and block structure errors.

OPTIONS:
    -v, --verbose       Show detailed validation information
    -h, --help          Show this help message

EXAMPLES:
    # Validate single file
    $(basename "$0") patterns/hero.php

    # Validate all patterns
    $(basename "$0") patterns/*.php

    # Validate with detailed output
    $(basename "$0") --verbose patterns/hero.php

VALIDATION CHECKS:
    ✓ JSON syntax in block comments
    ✓ No custom CSS variables in JSON attributes (WordPress presets are allowed)
    ✓ PHP syntax validation
    ✓ Block id/localId matching
    ✓ Class attribute requirement for styleAttributes
    ✓ Opening/closing comment matching
    ✓ Tag parameter consistency

EOF
    exit 0
}

# Print functions
print_error() {
    echo -e "${RED}✗ ERROR:${NC} $1" >&2
    ((TOTAL_ERRORS++))
}

print_warning() {
    echo -e "${YELLOW}⚠ WARNING:${NC} $1"
}

print_success() {
    echo -e "${GREEN}✓${NC} $1"
}

print_info() {
    if [ "$VERBOSE" = true ]; then
        echo -e "${BLUE}ℹ${NC} $1"
    fi
}

# Extract JSON from WordPress block comments
extract_block_json() {
    local file="$1"
    local line_num="$2"

    # Extract the content between <!-- wp: and -->
    sed -n "${line_num}p" "$file" | sed -E 's/.*<!-- wp:[^ ]+ (.*) -->.*/\1/'
}

# Validate JSON syntax
validate_json() {
    local file="$1"
    local has_errors=false

    print_info "Validating JSON in block comments..."

    # Find all WordPress block opening comments
    local line_num=0
    while IFS= read -r line; do
        ((line_num++))

        if [[ $line =~ ^\s*\<!--\ wp: ]]; then
            # Extract JSON portion - handle both "<!-- wp:blockname {...} -->" and "<!-- wp:blockname -->"
            local json_part=$(echo "$line" | sed 's/.*<!-- wp:[^ ]* *\(.*\) *-->.*/\1/')

            # Remove self-closing marker if present (} / or just /)
            json_part=$(echo "$json_part" | sed 's/ *\/ *$//')

            # Skip if no JSON (self-closing blocks without attributes or empty attributes)
            if [[ "$json_part" == "/>" ]] || [[ -z "$json_part" ]] || [[ "$json_part" =~ ^[[:space:]]*$ ]] || [[ "$json_part" == "$line" ]]; then
                continue
            fi

            # Validate JSON with jq
            if ! echo "$json_part" | jq . > /dev/null 2>&1; then
                print_error "Invalid JSON at $file:$line_num"
                echo "         Line: $line"

                # Try to provide specific error
                local jq_error=$(echo "$json_part" | jq . 2>&1)
                echo "         jq error: $jq_error"
                has_errors=true

                # Check for common errors
                if [[ "$json_part" =~ ,\s*\} ]] || [[ "$json_part" =~ ,\s*\] ]]; then
                    print_warning "Possible trailing comma detected"
                fi

                if [[ "$json_part" =~ \'[^\']*\' ]]; then
                    print_warning "Possible single quotes instead of double quotes"
                fi
            fi
        fi
    done < "$file"

    if [ "$has_errors" = false ]; then
        print_success "JSON validation passed"
        return 0
    else
        return 1
    fi
}

# Build list of defined custom properties from theme.json
build_custom_properties_list() {
    local theme_json="theme.json"

    if [ ! -f "$theme_json" ]; then
        echo ""
        return
    fi

    # Extract all custom property paths from theme.json
    # Converts "fontWeight: bold" to "--font-weight--bold"
    jq -r '.settings.custom | to_entries[] | .key as $cat | .value | keys[] | "--\($cat)--\(.)"' "$theme_json" 2>/dev/null | \
    # Convert camelCase to kebab-case
    sed 's/\([A-Z]\)/-\1/g' | tr '[:upper:]' '[:lower:]' || echo ""
}

# Validate no CSS variables in JSON attributes
validate_no_css_vars_in_json() {
    local file="$1"
    local has_errors=false

    # Build list of defined custom properties
    local defined_custom_props=$(build_custom_properties_list)

    print_info "Checking for CSS variables in JSON attributes..."

    # Find all WordPress block opening comments
    local line_num=0
    while IFS= read -r line; do
        ((line_num++))

        if [[ $line =~ ^\s*\<!--\ wp: ]]; then
            # Extract JSON portion
            local json_part=$(echo "$line" | sed 's/.*<!-- wp:[^ ]* *\(.*\) *-->.*/\1/')

            # Remove self-closing marker if present
            json_part=$(echo "$json_part" | sed 's/ *\/ *$//')

            # Skip if no JSON
            if [[ "$json_part" == "/>" ]] || [[ -z "$json_part" ]] || [[ "$json_part" =~ ^[[:space:]]*$ ]] || [[ "$json_part" == "$line" ]]; then
                continue
            fi

            # Check for undefined CSS variables in JSON attributes
            # WordPress presets are allowed: var(--wp--preset--*) (assumed to be defined)
            # WordPress custom properties: var(--wp--custom--*) (check if defined)
            # Theme-specific undefined variables are NOT allowed: var(--theme-name-*)

            # First, find all var() that are NOT --wp--preset-- or --wp--custom--
            local undefined_vars=$(echo "$json_part" | grep -oE 'var\(--[^)]+\)' | grep -vE 'var\(--wp--(preset|custom)--' || true)

            if [ -n "$undefined_vars" ]; then
                print_error "Undefined CSS variable found in JSON attributes at $file:$line_num"
                echo "         WordPress blocks only support var(--wp--preset--*) and var(--wp--custom--*)"
                echo "         Variables must be defined in theme.json settings"
                echo "         Line: $line"
                echo "         Found: $undefined_vars"
                print_warning "Define in theme.json settings.custom, use static value, or move to inline style"
                has_errors=true
            fi

            # Second, check if --wp--custom-- variables are actually defined in theme.json
            if [ -n "$defined_custom_props" ]; then
                local custom_only_vars=$(echo "$json_part" | grep -oE 'var\(--wp--custom--[^)]+\)' || true)

                for var in $custom_only_vars; do
                    # Extract the property path (e.g., --border-radius--md from var(--wp--custom--border-radius--md))
                    local prop_path=$(echo "$var" | sed 's/var(--wp--custom//' | sed 's/).*//')

                    # Check if this property path exists in our defined list
                    # Use grep -F -- to treat $prop_path as a literal string (not options)
                    if ! echo "$defined_custom_props" | grep -qF -- "$prop_path"; then
                        print_error "Undefined --wp--custom property at $file:$line_num"
                        echo "         Variable: $var"
                        echo "         Property $prop_path not found in theme.json settings.custom"
                        echo "         Line: $line"
                        print_warning "Add property to theme.json settings.custom or use a defined property"
                        has_errors=true
                    fi
                done
            fi
        fi
    done < "$file"

    if [ "$has_errors" = false ]; then
        print_success "No undefined CSS variables in JSON attributes"
        return 0
    else
        return 1
    fi
}

# Validate PHP syntax
validate_php() {
    local file="$1"

    print_info "Validating PHP syntax..."

    # Run PHP lint
    if php -l "$file" > /dev/null 2>&1; then
        print_success "PHP syntax validation passed"
        return 0
    else
        print_error "PHP syntax error in $file"
        php -l "$file" 2>&1 | grep -v "^No syntax errors"
        return 1
    fi
}

# Validate WordPress block structure
validate_block_structure() {
    local file="$1"
    local has_errors=false

    print_info "Validating WordPress block structure..."

    # Simple arrays to track blocks (compatible with bash 3.x)
    local -a block_stack_names
    local -a block_stack_lines
    local block_ids_list=""
    local stack_depth=0
    local line_num=0

    while IFS= read -r line || [ -n "$line" ]; do
        ((line_num++))

        # Check for opening block comment (handles both <!-- wp:block {...} --> and <!-- wp:block -->)
        # BUT skip self-closing blocks (<!-- wp:block /--> or <!-- wp:block />-->)
        if echo "$line" | grep -q '<!-- *wp:' && ! echo "$line" | grep -q ' */-->'; then
            # Extract block name using parameter expansion (more reliable than sed)
            local temp="${line#*wp:}"
            local block_name="${temp%% *}"
            block_name="${block_name%%/*}"
            # Remove leading/trailing whitespace
            block_name=$(echo "$block_name" | xargs)
            # Extract everything between block name and -->
            local block_attrs=$(echo "$line" | sed 's/.*<!-- wp:[^ ]* *\(.*\) *-->.*/\1/')

            block_stack_names[$stack_depth]="$block_name"
            block_stack_lines[$stack_depth]="$line_num"
            ((stack_depth++))

            # Extract and validate id/localId if present
            if [[ $block_attrs =~ \"id\":\"([^\"]+)\" ]]; then
                local block_id="${BASH_REMATCH[1]}"

                # Check if localId matches
                if [[ $block_attrs =~ \"localId\":\"([^\"]+)\" ]]; then
                    local local_id="${BASH_REMATCH[1]}"
                    if [ "$block_id" != "$local_id" ]; then
                        print_error "id/localId mismatch at $file:$line_num"
                        echo "         id='$block_id' != localId='$local_id'"
                        has_errors=true
                    fi
                fi

                # Check for duplicate IDs (using simple string search)
                if echo "$block_ids_list" | grep -q "^$block_id:"; then
                    local prev_line=$(echo "$block_ids_list" | grep "^$block_id:" | cut -d: -f2)
                    print_error "Duplicate block ID '$block_id' at $file:$line_num"
                    echo "         Previously used at line $prev_line"
                    has_errors=true
                else
                    block_ids_list="$block_ids_list$block_id:$line_num
"
                fi
            fi

            # Check if styleAttributes requires class attribute
            if [[ $block_attrs =~ \"styleAttributes\":\{.*?\} ]] || [[ $block_attrs =~ \"styleAttributes\":\[.*?\] ]]; then
                if ! [[ $block_attrs =~ \"className\":\"([^\"]+)\" ]]; then
                    # Check next line for class in HTML
                    local next_line=$(sed -n "$((line_num + 1))p" "$file")
                    if ! [[ $next_line =~ class= ]]; then
                        print_error "styleAttributes present but class attribute missing at $file:$line_num"
                        has_errors=true
                    fi
                fi
            fi

            # Check tag parameter matches HTML tag (next line check)
            if [[ $block_attrs =~ \"tagName\":\"([^\"]+)\" ]]; then
                local expected_tag="${BASH_REMATCH[1]}"
                local next_line=$(sed -n "$((line_num + 1))p" "$file")

                if [[ $next_line =~ ^\s*\<([a-zA-Z0-9]+) ]]; then
                    local actual_tag="${BASH_REMATCH[1]}"
                    if [ "$expected_tag" != "$actual_tag" ]; then
                        print_warning "tagName '$expected_tag' doesn't match HTML tag '$actual_tag' at $file:$line_num"
                    fi
                fi
            fi

        # Check for closing block comment (handles both <!-- /wp:block --> and <!-- /wp:block  -->)
        elif echo "$line" | grep -q '<!-- */wp:'; then
            # Extract block name using parameter expansion
            local temp="${line#*/wp:}"
            local closing_block="${temp%% *}"
            closing_block="${closing_block%%/*}"
            # Remove leading/trailing whitespace
            closing_block=$(echo "$closing_block" | xargs)

            if [ $stack_depth -eq 0 ]; then
                print_error "Unexpected closing block '<!-- /wp:$closing_block -->' at $file:$line_num"
                has_errors=true
            else
                ((stack_depth--))
                local opening_block="${block_stack_names[$stack_depth]}"
                local opening_line="${block_stack_lines[$stack_depth]}"

                if [ "$opening_block" != "$closing_block" ]; then
                    print_error "Mismatched block tags at $file:$line_num"
                    echo "         Expected '<!-- /wp:$opening_block -->' (opened at line $opening_line)"
                    echo "         Found '<!-- /wp:$closing_block -->'"
                    has_errors=true
                fi
            fi
        fi
    done < "$file"

    # Check for unclosed blocks
    if [ $stack_depth -gt 0 ]; then
        print_error "Unclosed block(s) in $file:"
        for i in $(seq 0 $((stack_depth - 1))); do
            echo "         <!-- wp:${block_stack_names[$i]} --> at line ${block_stack_lines[$i]}"
        done
        has_errors=true
    fi

    if [ "$has_errors" = false ]; then
        print_success "Block structure validation passed"
        return 0
    else
        return 1
    fi
}

# Validate a single file
validate_file() {
    local file="$1"
    local file_has_errors=false

    echo ""
    echo "========================================="
    echo "Validating: $file"
    echo "========================================="

    ((TOTAL_FILES++))

    # Check if file exists
    if [ ! -f "$file" ]; then
        print_error "File not found: $file"
        ((FILES_WITH_ERRORS++))
        return 1
    fi

    # Run all validations
    validate_json "$file" || file_has_errors=true
    validate_no_css_vars_in_json "$file" || file_has_errors=true
    validate_php "$file" || file_has_errors=true
    validate_block_structure "$file" || file_has_errors=true

    if [ "$file_has_errors" = false ]; then
        echo ""
        print_success "All validations passed for $file"
        return 0
    else
        ((FILES_WITH_ERRORS++))
        echo ""
        print_error "Validation failed for $file"
        return 1
    fi
}

# Main script
main() {
    local files=()

    # Parse arguments
    while [[ $# -gt 0 ]]; do
        case $1 in
            -v|--verbose)
                VERBOSE=true
                shift
                ;;
            -h|--help)
                usage
                ;;
            -*)
                echo "Unknown option: $1"
                usage
                ;;
            *)
                files+=("$1")
                shift
                ;;
        esac
    done

    # Check if any files provided
    if [ ${#files[@]} -eq 0 ]; then
        echo "Error: No files specified"
        usage
    fi

    # Check for required tools
    if ! command -v jq &> /dev/null; then
        echo "Error: jq is required but not installed"
        echo "Install with: brew install jq"
        exit 1
    fi

    if ! command -v php &> /dev/null; then
        echo "Error: php is required but not installed"
        exit 1
    fi

    # Validate each file
    for file in "${files[@]}"; do
        validate_file "$file"
    done

    # Print summary
    echo ""
    echo "========================================="
    echo "VALIDATION SUMMARY"
    echo "========================================="
    echo "Total files checked: $TOTAL_FILES"
    echo "Files with errors: $FILES_WITH_ERRORS"
    echo "Total errors found: $TOTAL_ERRORS"
    echo ""

    if [ $FILES_WITH_ERRORS -eq 0 ]; then
        print_success "All files passed validation!"
        exit 0
    else
        print_error "Validation failed for $FILES_WITH_ERRORS file(s)"
        exit 1
    fi
}

main "$@"

#!/bin/bash

# Giovanni Theme Release Builder (Double-click version)
# Creates a clean zip file for WordPress distribution

# Change to the directory where this script is located
SCRIPT_DIR="$(dirname "$0")"
cd "$SCRIPT_DIR"

# Set the releases directory (parent folder)
RELEASES_DIR="../"

# Change to the giovanni theme directory
cd giovanni

# Colors for output
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${BLUE}🎨 Giovanni Theme Release Builder${NC}"
echo -e "${BLUE}=================================${NC}"

# Get version from style.css
VERSION=$(grep "Version:" style.css | head -1 | awk '{print $2}')
if [ -z "$VERSION" ]; then
    VERSION="1.0.0"
fi

echo -e "${YELLOW}Version: ${VERSION}${NC}"

# Create release filename in the releases directory
RELEASE_NAME="giovanni-theme-v${VERSION}"
ZIP_PATH="../${RELEASE_NAME}.zip"

echo -e "${YELLOW}Building: ${RELEASE_NAME}.zip in releases folder${NC}"

# Remove existing zip if it exists
if [ -f "$ZIP_PATH" ]; then
    rm "$ZIP_PATH"
    echo -e "Removed existing ${RELEASE_NAME}.zip"
fi

# Create the zip with only WordPress theme files
zip -r "$ZIP_PATH" . \
    --exclude ".git/*" \
    --exclude ".github/*" \
    --exclude ".claude/*" \
    --exclude ".DS_Store" \
    --exclude "*.log" \
    --exclude "node_modules/*" \
    --exclude ".distignore" \
    --exclude "build-release.sh" \
    --exclude "build-giovanni-release.command" \
    --exclude "*.md" \
    --exclude "*.backup" \
    --exclude "patterns/*.backup" \
    --exclude "package.json" \
    --exclude "package-lock.json" \
    --exclude "composer.json" \
    --exclude "composer.lock" \
    --exclude ".gitignore" \
    --exclude ".editorconfig" \
    --exclude "webpack.config.js" \
    --exclude "gulpfile.js" \
    --exclude "src/*" \
    --exclude "assets/src/*" \
    --exclude "*.map"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Successfully created ${RELEASE_NAME}.zip in releases folder${NC}"
    
    # Show file size
    SIZE=$(du -h "$ZIP_PATH" | cut -f1)
    echo -e "${YELLOW}File size: ${SIZE}${NC}"
    
    # Show what's included
    echo -e "\n${BLUE}📦 Package contents:${NC}"
    unzip -l "$ZIP_PATH" | head -20
    
    echo -e "\n${GREEN}🚀 Ready for WordPress installation!${NC}"
    echo -e "${YELLOW}Upload ${RELEASE_NAME}.zip to WordPress Admin > Themes > Add New${NC}"
    
    # Open Finder to show the releases folder with the created file
    open "../"
else
    echo -e "${RED}❌ Error creating release package${NC}"
fi

echo -e "\n${BLUE}Press any key to close this window...${NC}"
read -n 1
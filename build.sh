# This script is used to build the theme for production.
# It will package the theme files in a zip file

# Usage: $ bash ./build.sh
# Make sure to run this script from the root of the theme directory

# Check if the script is being run from the root of the theme directory
if [ ! -f "style.css" ]; then
  echo "This script must be run from the root of the theme directory."
  exit 1
fi

# read name of the parent folder (theme name)
THEME_NAME=$(basename "$(pwd)")

# Build The assets
pnpm build

# Zip the theme files excluding node_modules
zip -r "${THEME_NAME}.zip" . -x "node_modules/*"
# Check if the zip command was successful
if [ $? -eq 0 ]; then
  echo "Theme files have been successfully zipped into ${THEME_NAME}.zip"
else
  echo "Failed to zip theme files."
  exit 1
fi
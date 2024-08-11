#!/bin/bash
# An intentionally Vulnerable Lab for LFI and File Retrieval issues by Sid

# Check if the script is running as root
if [ "$EUID" -ne 0 ]; then
  echo "This script must be run as root. Please rerun it with sudo."
  exit 1
fi

echo "Running with sudo privileges..."

# Define colors for output
GREEN="\033[0;32m"
RED="\033[0;31m"
CYAN="\033[0;36m"
YELLOW="\033[1;33m"
NC="\033[0m" # No Color

# Define the project directory as the current working directory
PROJECT_DIR="$(pwd)"
LOGS_DIR="$PROJECT_DIR/logs"

echo -e "${CYAN}=============================="
echo -e "  Vulnerable Lab Setup Script"
echo -e "==============================${NC}"

# Create logs directory and set permissions
echo -e "${YELLOW}Creating logs directory with 755 permissions...${NC}"
mkdir -p "$LOGS_DIR"
chmod 755 "$LOGS_DIR"

# Locate the php.ini file and modify it
PHP_INI_PATH=$(php -i | grep "Loaded Configuration File" | awk '{print $5}')

if [ -f "$PHP_INI_PATH" ]; then
    echo -e "${YELLOW}Modifying php.ini to enable allow_url_include and allow_url_fopen...${NC}"
    if sed -i 's/allow_url_include = Off/allow_url_include = On/' "$PHP_INI_PATH" && \
       sed -i 's/allow_url_fopen = Off/allow_url_fopen = On/' "$PHP_INI_PATH"; then
        echo -e "${GREEN}php.ini updated successfully to enable allow_url_include and allow_url_fopen.${NC}"
    else
        echo -e "${RED}Failed to update php.ini. Please check the file path and permissions.${NC}"
        exit 1
    fi
else
    echo -e "${RED}php.ini file not found! Please ensure PHP is installed correctly.${NC}"
    exit 1
fi

# Start the PHP built-in server on port 8085
echo -e "${YELLOW}Starting the PHP built-in server on http://localhost:8085...${NC}"
php -S 127.0.0.1:8085 -t "$PROJECT_DIR" &

echo -e "${GREEN}Lab setup complete! You can access the lab at ${CYAN}http://localhost:8085/index.php${NC}"

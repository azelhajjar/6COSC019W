#! /usr/bin/bash

null="> /dev/null 2>&1"
r="\033[1;31m"
b="\033[1;34m"
w="\033[0m"


# Define the configuration file path
CONFIG_FILE="/etc/setoolkit/set.config"

# Use sed to replace 'Apache_Server=OFF' with 'Apache_Server=ON'
sed -i 's/^APACHE_SERVER=OFF/APACHE_SERVER=ON/' "$CONFIG_FILE"

echo "Configuration updated successfully."
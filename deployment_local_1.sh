#!/bin/bash

# Laravel Deployment Preparation Script

#Make the Script Executable:
#Run chmod +x deployment_local_1.sh to make the script executable.
#
#Execute the Script:
#Run ./deployment_local_1.sh from your Laravel project directory to execute the script.

echo "Starting deployment preparation..."

#compile all CSS and will copy all images, Js, Libs into the public directory
npm install
npm run build

# Step 1: Optimize Composer Autoload
# This step optimizes the Composer Autoload files.
echo "Optimizing Composer autoload..."
composer install --optimize-autoloader

#migrate the database tables
php artisan migrate

#seed the database records
php artisan db:seed

# Step 2: Update Environment File
# MANUAL STEP: Update your .env file with production settings.
# Ensure you set APP_ENV to production, APP_DEBUG to false, and other environment-specific settings.
echo "Please update the .env file with production settings, then press Enter to continue."
read -p ""

# Step 3: Generate Application Key
# This step generates a new application key.
echo "Generating application key..."
#php artisan key:generate

# Step 4: Clear and Cache Configurations
# These commands clear and cache your routes, config, and views.
echo "Caching configurations..."
php artisan cache:clear
php artisan route:cache
php artisan config:cache
php artisan view:cache

# Step 5: Set Directory Permissions
# This step sets the correct permissions for the storage and bootstrap/cache directories.
echo "Setting directory permissions... this should be done on remote host unless you are zipping the files and FTPing"
chmod -R 775 storage bootstrap/cache

# End of script
echo "Deployment preparation complete. Please check the output for any errors."

# Reminder for manual steps
echo "REMINDER: Ensure the .env file is correctly set up for the production environment."
echo "REMINDER: Review the web server configuration to serve the Laravel app from the public directory."

#Start server
echo "development server is accessible at http://localhost:3001"
php artisan serve --port=3000

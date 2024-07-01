#!/bin/bash

# Laravel Deployment Script

#Firest ssh to the remote server
ssh dh_fpjdyb@majikthise.dreamhost.com

#If you have already cloned the repo there,
cd feedel.org/arada-tax

#If this is the first time and yoa are about to clone
cd feedel.org
git clone https://yonatan-gasha:<token>/yonatan-gasha/arada-tax.git
cd arada-tax

#Make the Script Executable:
#On your server, run chmod +x deploy_laravel.sh to make the script executable.
#
#Execute the Script:
#Execute the script by running ./deploy_laravel.sh.

echo "Starting Laravel deployment... This script to be run from the deployment server"

# Make sure your dreamhost website configuration sets the Web directory to feedel.org/arada-tax/public.
# Go to Website Settings --> Additional Settings and Modify Paths

# Step 1.5 Install composer if you don't already have it on your Dreamhost server

# Full instructions are here https://help.dreamhost.com/hc/en-us/articles/214899037-Installing-Composer-overview
#Install Globally
#Log into your server via SSH.
#Navigate to your user's home directory.
#cd ~
#Make a directory for installation. You can choose any valid directory name, but these instructions will assume the directory ~/.php/composer.
#mkdir -p ~/.php/composer
#Navigate to the installation directory.
#cd ~/.php/composer
#Run the Composer installer.
#curl -sS https://getcomposer.org/installer | php
#If that does not work, try this instead:
#php -r "readfile('https://getcomposer.org/installer');" | php
#Edit .bash_profile Add the following path to the composer.phar file.
#vi ~/.bash_profile

#export PATH=/usr/local/php82/bin:$PATH
#export PATH=/home/USERNAME/.php/composer:$PATH
#Replace USERNAME with your shell username
#Save the file and close it.
#Run the following to update your .bash_profile:
# . ~/.bash_profile
#Rename the composer file for easier handling.
#mv ~/.php/composer/composer.phar ~/.php/composer/composer

# now you should be able to run composer commands

# Step 2: Install Composer Dependencies. We obviously do not check the Vendor folder to Git. So, rebuild dependencies again
echo "Installing Composer dependencies..."
cd /home/dh_fpjdyb/feedel.org/arada-tax || exit
composer install --optimize-autoloader --no-dev

# Step 3: Environment Configuration
# MANUAL STEP: Set up your .env file with production settings.
echo "Please set up the .env file with current environment settings, then press Enter to continue."
read -p ""

# Step 4: Generate Application Key
echo "Generating application key...IF there is not one already"
php artisan key:generate

# Step 5: Clear and Cache Configurations
echo "Caching configurations..."
php artisan cache:clear
php artisan route:cache
php artisan config:cache
php artisan view:cache

# Step 6: Directory Permissions
echo "Setting directory permissions..."
chmod -R 775 storage bootstrap/cache

# Step 7: Run Database Migrations
# MANUAL STEP: Before running migrations, ensure your database is set up and .env is configured.
echo "Running database migrations..."
php artisan migrate

# Step 8: Seed Database (if needed)
# MANUAL STEP: Run this if you have database seeders that need to be executed.
echo "Seeding the database... currently disabled"
php artisan db:seed

# End of script
echo "Laravel deployment complete. Please check the output for any errors."

# Reminder for manual steps
echo "REMINDER: Ensure the .env file is correctly set up for the production environment."
echo "REMINDER: Review the web server configuration to serve the Laravel app from the public directory."

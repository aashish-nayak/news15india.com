set -e
echo "Delpoying App..."

#Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in min')
    #Update codebase
    giit pull origin master
# Exit maintenance mode
php artisan up

echo "Application Deployed!"
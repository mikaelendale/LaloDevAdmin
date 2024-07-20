## Development Instructions

### To Update Deployed app After code changes

#### If there were any changes to composer.json (like new or updated packages), run:
``composer install --optimize-autoloader --no-dev``

#### Clear Caches

```
php artisan config:clear
```
``php artisan cache:clear``
``php artisan route:clear``
``php artisan view:clear``


#### Optimize Application
``php artisan optimize``

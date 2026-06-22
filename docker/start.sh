#!/bin/sh
set -e

echo "==> Starting RSVP API..."

# Run migrations
echo "==> DB_CONNECTION is: ${DB_CONNECTION}"
echo "==> Running database migrations..."
php artisan migrate --force

# Cache config and routes for production
echo "==> Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM in background
echo "==> Starting PHP-FPM..."
php-fpm -D

# Start Nginx in foreground
echo "==> Starting Nginx..."
nginx -g "daemon off;"

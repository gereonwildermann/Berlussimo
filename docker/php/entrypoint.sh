#!/bin/sh
set -e

cd /var/www

# Make storage + bootstrap cache writable for php-fpm (www-data).
# On Docker Desktop bind mounts this is usually already permissive, but this
# guarantees sessions, logs and the framework cache can be written.
chmod -R ug+rwX storage bootstrap/cache 2>/dev/null || true

# Drop any cached config/routes/views so the container's environment
# (DB_HOST=mysql, etc.) is the source of truth instead of a baked-in cache.
php artisan config:clear 2>/dev/null || true
php artisan route:clear  2>/dev/null || true
php artisan view:clear   2>/dev/null || true

exec "$@"

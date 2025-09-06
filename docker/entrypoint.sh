#!/usr/bin/env bash
set -e

# Optional: run migrations on boot if requested
if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
  php artisan migrate --force || true
  if [ "${RUN_SEEDERS:-false}" = "true" ]; then
    php artisan db:seed --force || true
  fi
fi

# Ensure storage symlink exists
php artisan storage:link || true

# Cache config/routes/views in production
if [ "${APP_ENV:-production}" = "production" ]; then
  php artisan config:cache || true
  php artisan route:cache || true
  php artisan view:cache || true
fi

exec "$@"

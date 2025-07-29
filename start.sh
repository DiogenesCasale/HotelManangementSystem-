#!/bin/sh

# Instala dependências do Laravel
composer install --no-interaction --prefer-dist

# Aguarda o banco de dados ficar pronto
sleep 10

# Gera a chave do Laravel
php artisan key:generate

# Executa as migrations (se necessário)
php artisan migrate --force

# Inicia o servidor do Laravel
exec php artisan serve --host=0.0.0.0 --port=8000

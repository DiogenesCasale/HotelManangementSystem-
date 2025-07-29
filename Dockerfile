FROM php:8.2-fpm

# Instala apenas as extensões necessárias
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Copia o Composer para dentro do container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia o script de inicialização
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Comando padrão do container (executa o script de inicialização)
CMD ["/start.sh"]

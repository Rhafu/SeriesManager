# Use a imagem oficial do PHP 8.2 com o servidor Apache
FROM php:8.2-apache

# Instale as extensões do PHP necessárias para o Laravel
RUN docker-php-ext-install pdo_mysql

# Configure o servidor Apache
RUN a2enmod rewrite

# Instale o Node.js e o npm
RUN apt-get update && \
    apt-get install -y nodejs npm

# Defina o diretório de trabalho como o diretório do aplicativo Laravel
WORKDIR /var/www/html/controle-series

# Copie o código-fonte do aplicativo para o contêiner
COPY . /var/www/html/controle-series

#Instalando composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instale as dependências do Laravel usando o Composer
RUN composer install

# Configure as permissões
RUN chown -R www-data:www-data storage bootstrap/cache

# Exponha a porta 80 para o servidor web
EXPOSE 80

# Comando padrão para iniciar o servidor Apache
CMD ["apache2-foreground"]
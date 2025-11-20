FROM wordpress:6.6.2-php8.2-apache

# Habilita mod_rewrite para estrutura de links permanentes
RUN a2enmod rewrite

# Ajusta diretório de trabalho
WORKDIR /var/www/html

# Em modo de desenvolvimento vamos usar bind mount do código local via docker-compose.
# Para produção você poderia copiar os arquivos:
# COPY . /var/www/html
# RUN chown -R www-data:www-data /var/www/html

# A imagem oficial já possui entrypoint e CMD adequados.

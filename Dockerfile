# PHP 8.2 resmi imajını kullanarak Apache ile PHP kurulumu yap
FROM php:8.2-apache

# Çalışma dizini belirle
WORKDIR /var/www/html

RUN apt-get update -y && apt-get install -y unzip libpq-dev libcurl4-gnutls-dev vim \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql curl bcmath opcache \
    && pecl install -o -f redis \
    && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*  # Clean up the apt cache to reduce image size

# Configure OPcache
RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.validate_timestamps=1'; \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=60'; \
    echo 'opcache.save_comments=1'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Composer'ı yükle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Apache mod_rewrite modülünü etkinleştir
RUN a2enmod rewrite

# Portu aç
EXPOSE 80

# Uygulama dosyalarını kopyala
COPY . /var/www/html

# Composer ile bağımlılıkları yükle (uygulama başlatılmadan önce)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Apache'nin www-data kullanıcısına dosya sahipliğini ver (isteğe bağlı)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www

# Apache sunucusunu başlat
CMD ["apache2-foreground"]

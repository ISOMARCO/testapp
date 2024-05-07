# PHP 8.2 resmi imajını kullanarak Apache ile PHP kurulumu yap
FROM php:8.2-apache

# Çalışma dizini belirle
WORKDIR /var/www/html

# Gerekli paketleri yükle
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev

# PHP uzantılarını yükle
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    mbstring \
    xml \
    ctype \
    json \
    gd

# Redis uzantısını PECL üzerinden yükle ve etkinleştir
RUN pecl install redis \
    && docker-php-ext-enable redis

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

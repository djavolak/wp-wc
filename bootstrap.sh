#!/usr/bin/env bash

# crate swap
sudo /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
sudo /sbin/mkswap /var/swap.1
sudo /sbin/swapon /var/swap.1

sudo apt-get update

echo "
   Installing MySql - dbName: nss | user:root | password:rootpass
***************************************************************"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password rootpass"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password rootpass"

sudo apt-get install -y mysql-common mysql-server mysql-client
mysql -u root -prootpass  -e "CREATE DATABASE nss;"

echo "
   Installing PHP 7.0...
***************************************************************"
sudo apt-get install -y zip unzip imagemagick
sudo apt-get install -y nginx
sudo apt-get install -y curl git redis-server
sudo apt-get install -y php7.0-zip php7.0-fpm php7.0-mcrypt php7.0-curl php7.0-cli php7.0-mysql php7.0-gd php7.0-intl php7.0-xsl
sudo apt-get install -y php-xdebug php7.0-mbstring xpdf php-redis php-imagick

# create config files
#if [ ! -f /vagrant/backend/config/config-local.php ]; then
#    cp /vagrant/backend/config/config.php.dist /vagrant/backend/config/config-local.php
#fi

cd /vagrant/

sudo bash -c "echo '
127.0.0.1       localhost

# The following lines are desirable for IPv6 capab
::1     ip6-localhost   ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters
ff02::3 ip6-allhosts
127.0.1.1       ubuntu-xenial   ubuntu-xenial
' > /etc/hosts"

sudo bash -c "echo 'server {
    listen 80;
    sendfile off;
    root /vagrant/public;
    index index.php;
    server_name nss.local;
    location / {
        try_files  \$uri /index.php;
    }
    client_max_body_size 16M;
    client_body_buffer_size 2M;

    location ~ \.php$ {
        try_files \$uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_param APPLICATION_ENV development;
    }
}' > /etc/nginx/sites-available/nss.local"

sudo ln -s /etc/nginx/sites-available/nss.local /etc/nginx/sites-enabled/nss.local
sudo service nginx restart

echo "
   Add this line to hosts file :
   192.168.5.22 nss.local
"
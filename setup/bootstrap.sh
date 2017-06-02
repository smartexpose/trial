debconf-set-selections <<< 'mysql-server mysql-server/root_password password myPassword'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password myPassword'
debconf-set-selections <<< "phpmyadmin phpmyadmin/internal/skip-preseed boolean true"
debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect"
debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean false"

apt-get update
apt-get install -y nginx mysql-server php7.0-fpm php7.0-cli php7.0-mysql php7.0-gmp php7.0-xml php7.0-curl php7.0-intl php7.0-mbstring composer phpmyadmin unzip
chown -R vagrant:vagrant /var/www
mysql -u root -pmyPassword -e "create database if not exists notificationcenter";
rm -R /var/www/html
ln -fs /vagrant /var/www/html
cp /vagrant/setup/nginx-default-conf /etc/nginx/sites-available/default
cp /vagrant/setup/nginx-phpmyadmin-conf /etc/nginx/sites-enabled/phpmyadmin
service nginx restart

# Use an official Python runtime as a parent image
FROM centos:latest

#install packages
RUN yum -y update
RUN yum -y install httpd mysql vim
#php 5.6
RUN yum install -y epel-release yum-utils
RUN yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum-config-manager --enable remi-php72
RUN yum install -y php php-common php-opcache php-mcrypt php-cli php-gd php-curl php-mysql php-mbstring php-xml php-zip zip unzip php-xdebug 

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /app
ADD ./httpd.conf /etc/httpd/conf/httpd.conf
ADD ./httpd-vhosts.conf /etc/httpd/conf.d/httpd-vhost.conf
ADD ./web_setup.sh /var/www/web_setup.sh
WORKDIR /var/www/

ENTRYPOINT ["sh", "/var/www/web_setup.sh"]

EXPOSE 80
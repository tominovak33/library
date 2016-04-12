# Apache reverse proxy

## Install packages:

    sudo apt-get install -y apache2 libapache2-mod-proxy-html libxml2-dev


## Enable Apache Modules

    sudo a2enmod proxy proxy_ajp proxy_http rewrite deflate headers proxy_balancer proxy_connect proxy_html

## Add to reverseProxy.vhost.conf:

    <VirtualHost *:80>
        ProxyPreserveHost On
        ProxyPass / http://localhost:3000/
        ProxyPassReverse / http://localhost:3000/
        ServerName reverseProxy.example.com 
    </VirtualHost>

## Enable vhost

    sudo a2enmod reverseProxy.vhost.conf

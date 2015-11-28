################
# URL Rewrites #
################

RewriteEngine On

RewriteBase /

# Allow .html files to be accessed with .tomi instead
RewriteRule ^(.*)\.tomi$ $1.html [L]

# Allow .html files to be accessed without the .html
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^([^\.]+)$ $1.html [NC,L]

######################################################

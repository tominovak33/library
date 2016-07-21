# Configuring Apache2 to run Python webapps with mod_wsgi

## Installation (Debian)

  * Check you have python installed:

        $ python --version

      Should display something like: `Python 2.7.11+`

  * Install Apache2 and the wsgi module

        $ sudo apt-get update
        $ sudo apt-get install apache2 libapache2-mod-wsgi
        $ sudo a2enmod wsgi
        $ sudo service apache2 restart

## Configuration

  * Create a new Virtual Host for your Python webapp

    * Copy the following into `/etc/apache2/sites-available/python.conf`:

           <VirtualHost *:80>
 
               ServerName python.local.dev
               ServerAlias wsgi.local.dev
               ServerAdmin tomi@example.com
 
               DocumentRoot /var/www/python/
 
               <Directory /var/www/python>
                   Require all granted
               </Directory>
 
               WSGIScriptAlias / /var/www/python/app/main.wsgi
 
           </VirtualHost>


  * Enable the virtual host

        $ sudo a2ensite python.conf

  * Create a directory/directories and wsgi script to match the paths you put in your vhost conf

    * Paste the following into the wsgi script you created:

          def application(environ, start_response):
          
              status = '200 OK'
          
              output = 'Hello World!'

              response_headers = [('Content-type', 'text/plain'),
                                  ('Content-Length', str(len(output)))]
              start_response(status, response_headers)

              return [output]


##### Navigate to the address defined in your Vhost file to see your application being served

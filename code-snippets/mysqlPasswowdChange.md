mysql -u root -h localhost -p
SET PASSWORD FOR 'userName'@'hostnameName' = PASSWORD('newPassword');
FLUSH PRIVILEGES;


# Root password reset:

/etc/init.d/mysql stop
mysqld_safe --skip-grant-tables &
mysql -u root

mysql> use mysql;
mysql> update user set password=PASSWORD("my-password-here") where User='root';
mysql> flush privileges;
mysql> quit

/etc/init.d/mysql stop
/etc/init.d/mysql start
mysql -u root -p

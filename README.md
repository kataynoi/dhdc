# dhdc config<br>
RECOMMEND
[php.ini]
max_execution_time=360000
post_max_size=64M
upload_max_filesize = 64M
memory_limit=1024M
max_input_time=3600

[Window]
edit C:\Windows\System32\drivers\etc\hosts 
- add on first line
127.0.0.1 localhost


[MariaBD]
#my.ini
sql_mode=NO_ENGINE_SUBSTITUTION

[UBUNTU14]
- nano /etc/ssh/sshd_config , PermitRootLogin yes
- apt-get update;
- sudo apt-get install mcrypt php5-mcrypt
- sudo php5enmod mcrypt
- sudo apt-get install php5-curl
- sudo apt-get install php5-mysqlnd; //LOAD DATA LOCAL
- sudo apt-get install php-mbstring
- sudo service apache2 restart
- CREATE DATABASE dhdc CHARACTER SET utf8 COLLATE utf8_general_ci;
- mysql -u root -p dhdc<dhdc.sql
- nano ../common/config/main-local.php
- php dhdc/chmod.php

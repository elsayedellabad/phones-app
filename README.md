# Phones-App
Backend App for Countries Phones Filteration Project by using Laravel Framework [V-8].

##### Server Requirments

WAMP/XAMP server which have the following packages enabled:

- PHP >= 7.4.0
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

##### Install Composer Dependency Manager for PHP:

- You can download it from https://getcomposer.org/

##### Installation steps:

1- Apply the following steps after opening CMD from the root path of your server as ex.[C:/wamp64/www/]:
```sh
git clone https://github.com/elsayedellabad/phones-app.git
cd phones-app
composer install
```

2- Update DB file path in the following configuration file ".env" in the root path of project to be able to read DB file successfully:
```sh
DB_DATABASE=C:/wamp64/www/phones-app/database/sample.db
```

3- Now you should be able to access our API app from your browser by using URL such as the following:
```sh
http://localhost/phones-app/public/api/customers
```
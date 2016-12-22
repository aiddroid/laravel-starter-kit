# Laravel Starter Kit

This is Laravel application template for starters,which inspired by trntv/yii2-starter-kit.

It was created as a fast start for building an advanced sites based on Laravel framework. 

It focused on covers typical use cases for a new laravel project and will help you to save time for doing the same work in every project

## [Screenshots](https://aiddroid.com/screenshots-of-laravel-starter-kit/)

## Before you start
Please, consider helping project via [contributions](https://github.com/aiddroid/laravel-starter-kit/issues). 

## TABLE OF CONTENTS
- [Features](#features)
- [Installation](#installation)
- [How to contribute?](#how-to-contribute)
- [Have any questions](#have-any-questions)

## FEATURES
- Beautiful and open source dashboard theme for backend [AdminLTE 2](http://almsaeedstudio.com/AdminLTE)
- Sign in, Sign up
- User management
- Content management: articles, categories
- Rich text edit support,e.g. WYSIWYG editor [redactor](https://imperavi.com/redactor/)
- Image upload and image manipulation [Intervention Image](http://image.intervention.io/)
- dotenv support
- Nginx config example
- JWT auth
- OAuth


## INSTALLATION
1.clone the code from github
```
git clone https://github.com/aiddroid/laravel-starter-kit.git
```
2.install composer dependencies
- new for composer?[learn composer](https://getcomposer.org/)
```
cd laravel-starter-kit
composer install
```
3.init laravel project
- copy .env file
```
cp .env.example .env
```
- generate key
```
php artisan key:generate
```
- edit your .env file with your own configure
```
vim .env
```
4.migrate database and fill demo data
```
php artisan migrate
php artisan db:seed
```
5.set up your vhost
```
vim /etc/nginx/conf.d/laravel-starter-kit.conf
```
```
server {
        listen 80;

        server_name  laravel-starter-kit.dev;
        #the path of project
        root /var/www/laravel-starter-kit/public;

        index index.php index.html;
        charset utf-8;
        server_tokens off;

        access_log  /var/log/nginx/laravel-starter-kit.dev.access.log  main;

        location ~ /\.git {
            deny  all;
        }

        location / {
            try_files $uri $uri/ /index.php?$args;
        }

        location ~ \.php$ {
            try_files $uri =404;
            fastcgi_pass 127.0.0.1:9000;
            fastcgi_index index.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include fastcgi_params;
        }

        # redirect server error pages to the static page /40x.html
        #
        error_page  404              /404.html;
        location = /40x.html {
        }

        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;
        location = /50x.html {
        }
    }
```
6.reload nginx,maybe you also need to update your hosts file

7.visit http://laravel-starter-kit.dev
- frontend http://laravel-starter-kit.dev
- backend http://laravel-starter-kit.dev/backend/
- sign in with
```
account:admin@gmail.com
password:123456
```

8.JWT api
- get auth token [/api/user/auth](http://laravel-starter-kit.dev/api/user/auth?email=admin@gmail.com&password=123456)
- get info by token [/api/user/info](http://laravel-starter-kit.dev/api/user/info?token=yourtokenhere)

9.OAuth
```
php artisan passport:install
```
- oauth client management [/backend/oauth/index](http://laravel-starter-kit.dev/backend/oauth/index)
- redirect to oauth page [/home/redirect](http://laravel-starter-kit.dev/home/redirect)


##How to contribute?
You can contribute via github pulls. Any help appreciated (^_^)

##Have any questions?
Mail to [aiddroid@gmail.com](mailto:aiddroid@gmail.com)

##READ MORE
laravel https://laravel.com/docs/

###NOTICE
This template was created for developers NOT for end users.
It's only a start where you can begin your application.
Good luck!

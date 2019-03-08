![](public/images/logo.png)

## Arka Kapı Digital Subscription System

## Requirements

- PHP >=7.1.3
- Composer
- NPM
- Git

## Install Requirements

```sh
$ sudo apt update
$ sudo apt install php-7.2
$ curl -sS https://getcomposer.org/installer -o composer-setup.php
$ sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
$ sudo apt install npm
$ sudo apt install git
```

## Installation

```sh
$ git clone https://github.com/arkakapi/subscription
$ cd subscription
$ composer install
$ npm install
$ cp .env.example .env
$ php artisan key:generate
```
and fill required env variables in the **.env** file and run following command for filling database.

`$ php artisan migrate --seed`

## Deploy for Development

Open 2 different terminal

- `$ php artisan serve` => Start PHP simple server and visit http://127.0.0.1:8000/
- `$ npm run watch` => Start NPM watcher and build frontend resources every save.

## Deploy to live

See this document: [https://laravel.com/docs/5.8/deployment]()

## Contributing

Thank you for considering contributing to the Arka Kapı Digital Subscription System! See [opened issues](https://github.com/arkakapi/subscription/issues).

## Security Vulnerabilities

If you discover a security vulnerability within Arka Kapı Digital Subscription System, please send an e-mail to Omer Citak via [omer@arkakapidergi.com](mailto:omer@arkakapidergi.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

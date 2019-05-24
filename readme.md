<p align="center"><img src="public/images/logo.png" /></p>
<p align="center"><b>Arka Kapı Digital Library</b></p>

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
$ git clone https://github.com/arkakapi/digital-library
$ cd digital-library
$ composer install
$ npm install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link
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

Thank you for considering contributing to the Arka Kapı Digital Library! See [opened issues](https://github.com/arkakapi/digital-library/issues).

## Security Vulnerabilities

If you discover a security vulnerability within Arka Kapı Digital Library, please send an e-mail to Omer Citak via [omer@arkakapidergi.com](mailto:omer@arkakapidergi.com). All security vulnerabilities will be promptly addressed.

## License

This software is licensed under [GNU AGPL v3](https://www.gnu.org/licenses/agpl-3.0.html). For details, please read LICENSE file.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details. 

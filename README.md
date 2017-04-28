**Under Development**

# Rubel
A Simple CMS worked by Laravel, React, and Bulma.

## Description
Rubel is the cms working with Laravel and React.

***DEMO***
Coming soon...

## Features
+ Easy to use
+ Developer friendly

## Requirement
+ PHP7
+ npm
+ yarn
+ Node.js

## Get Started

### Clone a respository
```
https://github.com/bmf-san/Rubel.git
```

### Setting for backend-app
```
cd Rubel/backend-app

composer install
npm install
yarn run build

cp .env.example .env
```

Please change these environment variables as necessary.

```
/* Setting for Rubel */
ADMIN_INFO_NAME=admin
ADMIN_INFO_EMAIL=admin@admin.com
ADMIN_INFO_PASSWORD=admin

DOMAIN=rubel
ADMIN_DOMAIN=admin.rubel
API_DOMAIN=api.rubel
```

### Setting for frontend-app

```
cd Rubel/frontend-app

npm install
yarn run build
```

### Provisioning

```
cd Rubel

vagrant init
vagrant provision
```

If you have no vagrant box in your host machine, you need to prepare a vagrant box before `vagrant init`.

An Ansible playbook has been in a directory. 
Please customize it as necessary.

### Setting a database

```
vagrant ssh
cd /path/to/Rubel

php artisan migration
php artisan db:seed
```

Now you can start Rubel!

## Anything Else
+ [Wiki - API Documentation](https://github.com/bmf-san/laravel-react-blog-boilerplate/wiki/API-Documentation)

## License
This project is licensed under the terms of the MIT license.

## Author
bmf - A Web Developer in Japan.

+ [@bmf-san](https://twitter.com/bmf_san)
+ [bmf-tech](http://bmf-tech.com/)

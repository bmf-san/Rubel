**Under Development**

# Rubel
A Simple CMS worked by Laravel, React, and Bulma.

- [github - bmf-san/Rubel](https://github.com/bmf-san/Rubel)
- [packagist - rubel/rubel](https://packagist.org/packages/rubel/rubel)

## Description
Rubel is the cms working with Laravel and React.

***DEMO***
Coming soon...

## Features
- Easy to use
- Developer friendly
- Beatiful UI

## Requirements
- PHP7
- npm
- yarn
- Node.js

## Get Started

### Installation



### Setting for backend-app
```
cd path/to/backend-app

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
cd path/to/frontend-app

npm install
yarn run build
```

### Provisioning

```
cd Rubel

vagrant init   # And customize a Vagrantfile by referring to the Vagrantfile.example.
vagrant provision
```

If you have no vagrant box in your host machine, you need to prepare a vagrant box before `vagrant init`.

An Ansible playbook has been in a directory.
Please customize it as necessary.

### Setting a database

```
vagrant ssh
mysql -uroot -p   # password has been written in /path/to/ansible/group_vars/vagrant.yml
create database rubel;
exit;

cd /path/to/backend-app

php artisan migration
php artisan db:seed
```

Now you can start Rubel!

## Anything Else
- [Wiki - API Documentation](https://github.com/bmf-san/laravel-react-blog-boilerplate/wiki/API-Documentation)

## License
This project is licensed under the terms of the MIT license.

## Author
bmf - A Web Developer in Japan.

- [@bmf-san](https://twitter.com/bmf_san)
- [bmf-tech](http://bmf-tech.com/)

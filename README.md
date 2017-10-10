[![CircleCI](https://circleci.com/gh/bmf-san/Rubel.svg?style=svg)](https://circleci.com/gh/bmf-san/Rubel)

# Rubel

Rubel - An Open Source CMS built with Laravel, React.

- [Rubel Demo](https://rubel.bmf-tech.com/)
- [Rubel Admin Demo](https://rubel-admin.bmf-tech.com/login)

  - `EMAIL: rubel@example.com / PASSWORD: rubel`

## Requirements

- PHP7
- npm
- Node.js

## Get Started

### Installation

Latest `git clone git@github.com:bmf-san/Rubel.git rubel`

Specified version `git clone -branch 1.0.0 git@github.com:bmf-san/Rubel.git rubel`

### Setting for backend-app

```console
cd path/to/backend-app

composer install
npm install
npm run build

cp .env.example .env
```

Please change these environment variables as necessary.

```console
/* Setting for Rubel */
ADMIN_NAME=admin
ADMIN_EMAIL=admin@admin.com
ADMIN_PASSWORD=admin

DOMAIN=rubel
ADMIN_DOMAIN=admin.rubel
API_DOMAIN=api.rubel
```

### Setting for frontend-app

```console
cd path/to/frontend-app

npm install
npm run build
```

### Provisioning

```console
cd Rubel

vagrant init

cd Rubel/ansible/group_vars/vagrant.yml.sample
cp vagrant.yml.sample vagrant.yml

cd Rubel/ansible
cp host.sample host

vagrant provision
```

If you have no vagrant box in your host machine, you need to prepare a vagrant box before `vagrant init`.

An Ansible playbook has been in a directory. Please customize it as necessary.

### Setting a database

```console
vagrant ssh
mysql -uroot -p   # password has been written in path/to/ansible/group_vars/vagrant.yml
create database rubel;
exit;

cd path/to/backend-app

php artisan migration
php artisan db:seed
```

Now you can start Rubel!

## Anything Else

- [Wiki - API Documentation](https://github.com/bmf-san/laravel-react-blog-boilerplate/wiki/API-Documentation)

## Contributing

We welcome your issue or pull request from everyone. Please check `ISSUE_TEMPLATE.md` and `PULL_REQUEST_TEMPLATE.md` to contribute.

If you want to find something to contibute, please check the [project](https://github.com/bmf-san/Rubel/projects/1).

## License

This project is licensed under the terms of the MIT license.

## Author

bmf - A Web Developer in Japan.

- [@bmf-san](https://twitter.com/bmf_san)
- [bmf-tech](http://bmf-tech.com/)

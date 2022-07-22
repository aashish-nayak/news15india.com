<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

<a href="https://news15india.com">News15India</a> is a News Blog Project Breaking News, Viral Lists, Awesome Polls and Popular Videos.

News15India brings to all these contents into one system. Create beautiful viral websites like Other News company You have advanced tools to do that. Great Post Editor, Powerfull Admin Panel and Impressive Design will you think big!

Get Started to make great community with News15India. TODAY!

## Installation

You can Clone this Project:

```bash
git clone https://github.com/aashish-nayak/news15india.com.git
```

After Clone go into project dir & run this command :

```bash
composer update --no-dev --no-interaction --prefer-dist --optimize-autoloader
```

Copy <span style="color:pink">.env</span> file :

```bash
cp .env.example .env
```

Generate Application Key :

```bash
php artisan key:generate
```

Setup <span style="color:pink">.env</span> file Database and other configs.

Migrate the database :

```bash
php artisan migrate
```

[Optional] Seed the database :
Seed Users Like = Super Admin, Admin, Auhtor, Editor

```bash
php artisan db:seed
```

Link Storage Path into Public_html Folder :

```bash
php artisan storage:link
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

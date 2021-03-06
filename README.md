<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Developer Test - Miloš Terzić

## Setup

- Pull project.
- Add these lines to `.env` file. Fill them with data provided by Reddit or contact me.
  ```
  REDDIT_CLIENT_ID=
  REDDIT_CLIENT_SECRET=
  REDDIT_REDIRECT_URI=
  ```
- Run `composer instal`
- Run `php artisan migrate`
- Run `php artisan key:generate`

## Task

Implement a simple Reddit like app using Laravel framework:

- [x] Project should be API based, preferably RESTful.
- [x] For user login please use Reddit API (https://www.reddit.com/dev/api/) only registered
  users can login
- [x] It should have thread CRUD
- [x] It should have comments CRUD
- [x] Only authenticated users can post a new thread and a new comment
- [ ] Only user who created the thread should be able to post that thread to real Reddit via
  Reddit API
- [x] Only user who created the thread should be able to edit the thread
- [x] Thread cannot be edited 6h after creation
- [x] Comments needs to be manually set as visible
- [x] Only user who created the thread can make comments visible
- [x] Comments should have reply option
- [x] Every child comment should have a reply option (infinite nesting)
- [x] Project should have two views: thread list view, thread view with infinite nested
  comments and reply

## Bonus
- [ ] Comments should have upvote function
- [x] Add phpunit through composer and write at least one test
  
## Tips
- Project need to use composer and at least composer autoload
- Design of the views is not important, you can use some theme or plain
  Bootstrap

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

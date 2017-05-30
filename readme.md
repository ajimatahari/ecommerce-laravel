<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

# Setup

1. Create a new project folder
```php
  $composer create-project laravel/laravel ecommerce-laravel
```

```php
  $php artisan migrate
```

2. How to run the project: download/clone link and run the next command:
```php
  $php artisan serve
```

# Project description

Simple ecommerce project.

## Project main features

- Cart system
- Ordering system (use cart items)
- One time payments setup (Stripe charge)
- Users management
- Products management
- Product reviews (added by customers and pending approval from the admin before being display on the product page)
- Sending mails to customers


## Resources used

- mailtrap.io (used for mailing tests during development)
- Crinsane cart (https://github.com/Crinsane/LaravelShoppingcart)
- Stripe.js for processing payments
- Reporting tab (on admin dashboard) from Google Analytics

## Future work (features and bug fixes)

- Fix middleware (admin)
- Send mail on register
- Redo checkout process (UK post code to stripe form and link address)
- Validate input
- Emails HTML templates (contact and order confirmation)
- Style reviews messages
- Live user search using AJAX
- Output HTML from database (reviews)
- Send message reply / send message to users (to their email address)
- Billing and invoices creation
- Save wishlists (cart instances)
- Push notifications

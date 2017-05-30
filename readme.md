<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"> Ecommerce project </p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


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

###Demo details
Admin username: admin@test.com
Admin password: admindemo

Customer username: customer@test.com
Customer password: customer


# Project description

Simple ecommerce project. On this project I tried to focus more on the functional part of the system rather on design.

## Project main features

- Cart system
- Ordering system (use cart items)
- Use stripe.js for single payments/charge (did not implement subscriptions)
- Users management
- Products management
- Product reviews (added by customers and pending approval from the admin before being display on the product page)
- Sending mails to customers


## Resources used

- mailtrap.io (used for mailing tests during development)
- Crinsane cart (https://github.com/Crinsane/LaravelShoppingcart)
- Stripe.js for processing payments
- Laravel Form helpers


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
- Create stripe customers on register
- Billing and invoices creation with stripe.js
- Save wishlists (cart instances)
- Push notifications
- Reporting tab (on admin dashboard) from Google Analytics

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"> Ecommerce project </p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


# Setup

## How to run the project
- Download / clone project link and from the repository
- Create a database named "ecommerce" on your localhost/server test
- Go to the folder project and run the migration with the seed data

```php
  $ php artisan migration --seed
```

- Run the next command to launch the project
```php
  $ php artisan serve
```

### Admin demo account details
Username: admin@test.com
Password: admindemo


### Customer demo account details
Username: customer@test.com
Password: customer


# Project description

Simple ecommerce project created from scratch. The project direction leaned towards the focus on the functional part of the system rather than the design part/skills.


## Project main features

- Cart system
- Ordering system (use cart items)
- Use stripe.js for single payments/charge (did not implement subscriptions)
- Users management
- Products management
- Product reviews (added by customers and pending approval from the admin before being display on the product page)
- Sending emails to customers on register, orders placed/confirmation, payment confirmation
- Contact messages management, send messages replies to users
- User address and payment details management, reviews, orders placed details


## Resources used

- PHP with Laravel, Bootstrap 4, HTML & CSS, MySQL, JavaScript
- mailtrap.io (used for mailing tests during development)
- Crinsane shopping cart (https://github.com/Crinsane/LaravelShoppingcart)
- Stripe.js for processing payments
- Laravel form helpers


## Future work (features and bug fixes)

- [ ] Fix middleware (admin)
- [X] Send mail on register
- [ ] Redo checkout process (UK post code to stripe form and link address)
- [ ] Validate input (address details, card/payment details, products, checkout)
- [ ] Emails HTML templates (contact and order confirmation)
- [ ] Style reviews messages
- [ ] Live user search using AJAX
- [ ] Output HTML from database (reviews)
- [ ] Send message reply / send message to users (to their email address)
- [ ] Create stripe customers on register
- [ ] Billing and invoices creation with stripe.js
- [ ] Save wishlists (cart instances)
- [ ] Push notifications
- [ ] Reporting tab (on admin dashboard) from Google Analytics
- [ ] Style product page

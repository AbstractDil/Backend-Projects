# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> **Warning**
> The end of life date for PHP 7.4 was November 28, 2022. If you are
> still using PHP 7.4, you should upgrade immediately. The end of life date
> for PHP 8.0 will be November 26, 2023.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## RestApi

- app/Routes/options route is mandatory.
- create CorsFilter.php in app/Filters/CorsFilter.php
- add optionsHandler function in api controller 

## Api Routes 

- apiBaseUrl: http://localhost/Sagar/Backend/vue-crud-api/api/v1

## API Endpoints of user

- GET: /server-status
- POST: /create-user
- GET: /verify-email/(:segment)
- POST: /login
- GET: /show-user/(:num)
- POST: /update-user/(:num)
- POST: /upload-profile-photo/(:num)
- POST: /forget-password
- POST: /delete-user (soft delete)
- POST: /change-password/(:segment)
- POST: /update-password/(:num) for loggedin user
- POST: /insert-form-response/(:num) (form id)
- POST: /all-form-responses?userId=(:num)&formId=(:num)&page=1&limit=10&order=DESC

## Usertype Codes

- user_type(1): active user
- user_type(2): admin
- user_type(3): blocked user
- user_type(0): temporary deleted of a user account

## Login Error

-  user_type(1) && is_email_verified(1) : Email verified, Active 
-  user_type(2) && is_email_verified(1) : Email verified,Role (Admin), Active 
-  user_type(0) && is_email_verified(1) : Email verified, Role (User), Account deleted by user itself or, temporary delete
-  user_type(3) && is_email_verified(1) : Email verfied, Role (User), Account Blocked 

## Admin Module (Request Types)

- req_type(1) : update email and name
- req_type(2) : block user for 15 minutes
- req_type(3) : hard delete user
- req_type(4) : deleted account recovery
- req_type(5) : unblock user account 
- req_type(6) : temporarily delete of a user account 
- req_type(7) : show a particular user's account




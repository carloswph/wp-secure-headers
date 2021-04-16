# WP Secure Headers Helper

A simple helper class to manage HTTP Security Headers made available when a website is under any SSL certificate. Unfortunately, many plugins are used to configure SSL, but miss the more elaborated part of it - include secure headers to requests. This class aims to offer a simple interface to set up those - bringing predefined headers adequate for most WP websites, but also enabling the coder to set or alter any header - and that may include customized HTTP headers as well.

# Installation

As we prefer, this library can be installed using Composer

`composer require carloswph/wp-secure-headers`.

Alternatively, you can just copy the class inside the `src` folder and use it in your plugin or theme.

# Usage

The class `WPH\Security\Headers` inserts secure headers for Wordpress. Having that said, it already comes with some basic headers, which can be seen by using the static method `wPH\Security\Headers::list()`. In the future, we intend to build some chained methods to allow configuring in detail two specific headers: Content-Security-Policy and Permissions-Policy. For the moment, both can be added to class instance through the `set()` method.

## Using with Composer

```php
use WPH\Security\Headers;

require __DIR__ . '/vendor/autoload.php';

$sec_headers = new Headers();
$sec_headers->set('Content-Security-Policy', 'connect-src "self"'); // Add new headers to the class array property.
```
## Content Security Policy

Since version 1.2.0, this library has an additional class, which can be passed as argument through the main class and adds the Content-Security-Policy header after being configured with dozens of chain methods. An example:

```php
use WPH\Security\Headers;
use WPH\Security\ContentSecurityPolicy

require __DIR__ . '/vendor/autoload.php';

$csp = new ContentSecurityPolicy();
$csp->setChild('https://google.com https://microsoft.com')
    ->setConnect('https://*');

$sec_headers = new Headers($csp); // Adds the Content-Security-Policy to the headers pool, with all set parameters
```
Besides all methods to the configure the various Content-Security-Policy directives individually, this additional class also has a method ReportOnly(), which indicates the main class that the header shall be set as Content-Security-Policy-Report-Only instead. All documentation and info about this complex header can be found inside the class docblock comments.

# Todo

* Methods to setup and configure Permissions Policy headers
* Some cookie managing tools

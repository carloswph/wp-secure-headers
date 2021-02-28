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

# Todo

* Methods to setup and configure CSP and Permissions Policy headers
* Some cookie managing tools

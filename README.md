
# Toastr Notifications for Laravel

Toastr for Laravel is a wrapper around the popular php-flasher  library, providing an easy-to-use interface for displaying notifications in your Laravel application. It includes a service provider, a facade, and a helper function to make it easy to use Toastr in your views and controllers.With Laravel Toastr, you can easily display toast messages on your website with minimal configuration.

### Requirements
* PHP 7.2 or higher
* Laravel 5.5 or higher

### Installation
To install Toastr for Laravel, simply run the following command:

```bash
  composer require jeybin/toastr
```
After installing the package, run the following command 

```bash
  php artisan toastr:install
```
 This will copy the configuration file to config/jeybin-toastr.php 


### Usage
To use Laravel Toastr in your Laravel application, simply use  the Toastr facade Jeybin\Toastr\Toastr  to display a notification:

```php
\Jeybin\Toastr\Toastr::success('Your message here')->toast();
```

You can also use other notification types like error, warning, and info:

```php
\Jeybin\Toastr\Toastr::error('Your error message here')->toast();
\Jeybin\Toastr\Toastr::warning('Your warning message here')->toast();
\Jeybin\Toastr\Toastr::info('Your info message here')->toast();
```

Another option is to redirect to a different page and display a notification there as well.

The $route variable can either be a whole url, a named route, or empty/null.
It will perform redirect()->back() with notification if it is empty or null. 

```php

  return \Jeybin\Toastr\Toastr::success('Hello world')->redirect($route);

```

The config/jeybin-toastr.php file makes it simple to add or modify the redirection status code. Alternatively, you may supply the status code by using the syntax shown below: $statusCode must be an integer; the default value is 302. 

```php

  return \Jeybin\Toastr\Toastr::success('Hello world')
               ->redirectStatusCode($statusCode)
               ->redirect($route);

```

### Customization
Laravel Toastr supports customization of the notification style, position, animation, and more. The configurations can be changed from the config/jeybin-toastr.php

```php

return [  
    /**
     * Time out in seconds
     */
    'timeout'=>1000,

    /**
     * show close button
     */
    'show_close_btn'=>true,

    /**
     * show progress bar
     */
    'show_progress_bar'=>true,

    /**
     * Prevent showing duplicate notifications
     */
    'prevent_duplicates'=>true,

    /**
     * Redirect status code default : 302
     */
    'redirect_status_code'=>302

];

```

Or you can change the configurations from by the time of function call itself :

```php 
\Jeybin\Toastr\Toastr::success('message')
      ->closeBtn(false)
      ->progressBar(false)
      ->preventDuplicates(false)
      ->rtl(true)
      ->timeOut(1500)
      ->toast();
```

* closeBtn(boolean) - Default : true
* progressBar(boolean)  - Default : true
* preventDuplicates(boolean)  - Default : true
* rtl(boolean)  - Default : false
* timeOut(integer)  - Default : 1000
* redirectStatusCode(integer) - default : 302 
  use if you are using the redirect function

### Features

* Easy to install and configure.
* Compatible with Laravel 5.6 and above.
* Highly customizable: change the style, position, animation, and more.
* Responsive: works on all devices and screen sizes.
* Lightweight: only 7kb minified and gzipped.

### Contributing

If you would like to contribute to Laravel Toastr, please feel free to submit a pull request or open an issue on the GitHub page.

### License
Laravel Toastr is released under the MIT License.

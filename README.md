
# Toastr for Laravel

Toastr for Laravel is a wrapper around the popular php-flasher  library, providing an easy-to-use interface for displaying notifications in your Laravel application. It includes a service provider, a facade, and a helper function to make it easy to use Toastr in your views and controllers.With Laravel Toastr, you can easily display toast messages on your website with minimal configuration.

### Requirements
* PHP 7.2 or higher
* Laravel 5.5 or higher

### Installation
To install Toastr for Laravel, simply run the following command:

```bash
  composer require jeybin/toastr
```
After installing the package, you need to add the service provider and facade to your config/app.php file:

```php
'providers' => [
    // ...
    Jeybin\Toastr\ToastrServiceProvider::class,
],

'aliases' => [
    // ...
    'Toastr' => Jeybin\Toastr\Facades\Toastr::class,
],

```

Finally, you need to publish the configuration file:

```php
php artisan vendor:publish --provider="Jeybin\Toastr\ToastrServiceProvider" --tag="config"
```

### Usage
To use Laravel Toastr in your Laravel application, simply call the Toastr facade to display a notification:

```php
Toastr::success('Your message here')->toast();
```

You can also use other notification types like error, warning, and info:

```php
Toastr::error('Your error message here')->toast();
Toastr::warning('Your warning message here')->toast();
Toastr::info('Your info message here')->toast();
```

### Customization
Laravel Toastr supports customization of the notification style, position, animation, and more. The configurations can be changed from the config/toastr-config.php

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
    'prevent_duplicates'=>true

];

```

Or you can change the configurations from by the time of function call itself :

```php 
Toastr::success('message')
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

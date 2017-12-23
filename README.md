# Leroy Merlin Brazil driver for Laravel Socialite

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vitorbari/lmbr-socialite-driver.svg?style=flat-square)](https://packagist.org/packages/vitorbari/lmbr-socialite-driver)


## Installation

You can install the package via composer:

```bash
composer require vitorbari/lmbr-socialite-driver
```

This service provider must be installed.

```php
// config/app.php
'providers' => [
    ...
    LeroyMerlin\Socialite\ServiceProvider::class,
];
```

## Configuration and Usage

Just follow the [Socialite Documentation](http://laravel.com/docs/socialite)
using `leroy-merlin` on your `config/services.php` and `driver`.
For example:

```php
// config/services.php
'leroy-merlin' => [
    'client_id' => env('LMBR_CLIENT_ID'),         // Your Leroy Merlin Client ID
    'client_secret' => env('LMBR_CLIENT_SECRET'), // Your Leroy Merlin Client Secret
    'redirect' => 'http://your-callback-url',
],
```

```php
public function redirectToProvider()
{
    return Socialite::driver('leroy-merlin')->redirect();
}

...

public function handleProviderCallback()
{
    $user = Socialite::driver('leroy-merlin')->user();

    // $user->getName();
    // $user->getEmail();
}
```
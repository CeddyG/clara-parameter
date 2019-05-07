Clara Parameter
===============

## Installation

```php
composer require ceddyg/clara-parameter
```

Add to your providers in 'config/app.php'
```php
CeddyG\ClaraParameter\ParameterServiceProvider::class,
```

Then to publish the files.
```php
php artisan vendor:publish --provider="CeddyG\ClaraParameter\ParameterServiceProvider"
```

## Use

```php
$sParam = param($sSlug, $sDefaultValue);
```
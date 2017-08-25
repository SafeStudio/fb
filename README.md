
# Firebase easy REST API wrapper for Laravel and Lumen

[![Build Status](https://travis-ci.org/safestudio/firebase-laravel.svg?branch=master)](https://travis-ci.org/safestudio/firebase-laravel)
[![Latest Stable Version](https://poser.pugx.org/safestudio/firebase-laravel/v/stable)](https://packagist.org/packages/safestudio/firebase-laravel) 
[![Total Downloads](https://poser.pugx.org/safestudio/firebase-laravel/downloads)](https://packagist.org/packages/safestudio/firebase-laravel) 
[![Latest Unstable Version](https://poser.pugx.org/safestudio/firebase-laravel/v/unstable)](https://packagist.org/packages/safestudio/firebase-laravel)
[![License](https://poser.pugx.org/safestudio/firebase-laravel/license)](https://packagist.org/packages/safestudio/firebase-laravel) 

### Installation

#### Laravel

```bash
composer require safestudio/firebase-laravel
```
After installing composer package, add the ServiceProvider to the providers array in `config/app.php`

```php
SafeStudio\Firebase\FirebaseServiceProvider::class,
```

Add this to your aliases for shorter code:

```php
'Firebase' => SafeStudio\Firebase\Facades\FirebaseFacades::class,
```

Insert the config settings in `config/services.php` like this:

```php
    'firebase' => [
        'database_url' => env('FB_DATABASE', 'https://project-id.firebaseio.com/'),
        'secret' => env('FB_DATABASE_KEY', 'dbsecretkey'),
    ]
```

> You can get Firebase `secret` token like so:
> - Click on the gear icon in you Firebase Console
> - Click Project settings
> - Click on the Service Account tab
> - Click on the Database Secrets link in the inner left-nav
> - Hover over the non-displayed secret and click Show

#### Lumen


```bash
composer require safestudio/firebase-laravel
```
After installing composer package, add the ServiceProvider to the providers array in `bootstrap/app.php`

```php
$app->register(SafeStudio\Firebase\FirebaseServiceProvider::class);
```

Add this to your aliases for shorter code:

```php
class_alias(SafeStudio\Firebase\Facades\FirebaseFacades::class, 'Firebase');
```

Make sure this line is uncommented:

```php
$app->withFacades();
```

Add this line:

```php
$app->configure('services');
```

Insert the environment variables in `.env` like this:

```
FB_DATABASE=https://PROJECT.firebaseio.com
FB_DATABASE_KEY=KB2xZjJgAvmPROJECT8ykNrT6f2emuuaxJTr9
```

Insert the config settings in `config/services.php` like this:

```php
    'firebase' => [
        'database_url' => env('FB_DATABASE', 'https://project-id.firebaseio.com/'),
        'secret' => env('FB_DATABASE_KEY', 'dbsecretkey'),
    ]
```

> You can get Firebase `secret` token like so:
> - Click on the gear icon in you Firebase Console
> - Click Project settings
> - Click on the Service Account tab
> - Click on the Database Secrets link in the inner left-nav
> - Hover over the non-displayed secret and click Show

# Usage

```php
$data = ['key' => 'data' , 'key1' => 'data1']
Firebase::set('/test/',$data); 

Firebase::get('/test/',['print'=> 'pretty']);

Firebase::push('/test/',$data); 

Firebase::update('/test/',['key1' => 'Updating data by key']); 

Firebase::delete('/test/'); 
```

----
For more options see firebase REST [official documentation](https://firebase.google.com/docs/database/rest/start) 








# Firebase easy REST API wrapper for Laravel

[![Build Status](https://travis-ci.org/SafeStudio/firebase-php.svg?branch=master)](https://travis-ci.org/SafeStudio/firebase-php)
[![Latest Stable Version](https://poser.pugx.org/safestudio/firebase-php/v/stable)](https://packagist.org/packages/safestudio/firebase-php) 
[![Total Downloads](https://poser.pugx.org/safestudio/firebase-php/downloads)](https://packagist.org/packages/safestudio/firebase-php) 
[![Latest Unstable Version](https://poser.pugx.org/safestudio/firebase-php/v/unstable)](https://packagist.org/packages/safestudio/firebase-php)
[![License](https://poser.pugx.org/safestudio/firebase-php/license)](https://packagist.org/packages/safestudio/firebase-php) 

### Installation

```bash
composer require safestudio/firebase
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
        'database_url' => 'https://PROJECT.firebaseio.com',
        'secret' => 'KB2xZjJgAvmPROJECT8ykNrT6f2emuuaxJTr9',
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







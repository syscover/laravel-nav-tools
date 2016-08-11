# NavTools package to Laravel 5.2

[![Total Downloads](https://poser.pugx.org/syscover/nav-tools/downloads)](https://packagist.org/packages/syscover/nav-tools)

## Installation

**1 - After install Laravel framework, insert on file composer.json, inside require object this value and execute composer install**
```
"syscover/nav-tools": "~1.0"

```
execute on console:
```
composer install
```

**2 - Register service provider, on file config/app.php add to providers array**

```
Syscover\NavTools\NavToolsServiceProvider::class,

```

**3 - Register middlewares pulsar.navTools on file app/Http/Kernel.php add to routeMiddleware array**

```
'pulsar.navTools' => \Syscover\NavTools\Middleware\NavTools::class,

```

**4 - To publish package, you must type on console**

```
php artisan vendor:publish

```

## General configuration environment values

### Set NAVTOOLS_URL_TYPE options on environment file .env
Set url type for you web, you have three types, lang, country or lang-country, for urls type lang:
```
NAVTOOLS_URL_TYPE=lang
```
you can work with this urls
```
hrrp://mydomain.com/en/any-page
```

for urls type country
```
NAVTOOLS_URL_TYPE=country
```
you can work with this urls
```
hrrp://mydomain.com/us/any-page
```

for urls type lang-country
```
NAVTOOLS_URL_TYPE=lang-country
```
you can work with this urls
```
hrrp://mydomain.com/en-us/any-page
```


### Set NAVTOOLS_LANGS options on environment file .env
Set countries available in your web
```
NAVTOOLS_COUNTRIES=us|gb|es
```


### Set NAVTOOLS_DEFAULT_COUNTRY options on environment file .env
Set default country for your web
```
NAVTOOLS_DEFAULT_COUNTRY=es
```


### Routing with NavTools
On app\Http\routes.php file use this cloure to implement routes with translation

```
Route::group(['middleware' => ['pulsar.navTools']], function() {

    // write here your routes

});

```

#### Route configuration
you have several configuration options:

Write your routes with locale variable:

```
Route::group(['middleware' => ['pulsar.navTools']], function() {
    Route::get('/',                         function(){ return view('www.index'); });
    Route::get('{locale}',                  function(){ return view('www.index'); });
    Route::post('{locale}/contact',         ['as'=>'contact',  'uses'=>'FrontEndController@contact']);
});

```

Set lang variable on your routes

```
Route::group(['middleware' => ['pulsar.navTools']], function() {
    Route::get('/',                   function(){ return view('www.index'); });

    Route::get('en',                  function(){ return view('www.index'); });
    Route::get('es',                  function(){ return view('www.index'); });

    Route::post('en/contact',         ['as' => 'contact-en',          'uses'=>'FrontEndController@contact']);
    Route::post('es/contacto',        ['as' => 'contact-es',          'uses'=>'FrontEndController@contact']);
});

```

### Get values in views

You can get lang and country values with this helpers
```
user_country(); // to get country user
user_lang(); // to get language user
```
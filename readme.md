# NavTools package to Laravel 5.4

<a href="https://packagist.org/packages/syscover/laravel-nav-tools"><img src="https://poser.pugx.org/syscover/laravel-nav-tools/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/syscover/laravel-nav-tools"><img src="https://poser.pugx.org/syscover/laravel-nav-tools/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/syscover/laravel-nav-tools"><img src="https://poser.pugx.org/syscover/laravel-nav-tools/license.svg" alt="License"></a>

## Installation

**1 - From the command line run**
```
composer require syscover/laravel-nav-tools
```

**2 - Register service provider, on file config/app.php add to providers array**
```
Syscover\NavTools\NavToolsServiceProvider::class,
```

**3 - To publish package, you must type on console**
```
php artisan vendor:publish --provider="Syscover\NavTools\NavToolsServiceProvider"
```

**4 - Register middlewares pulsar.navTools on file app/Http/Kernel.php add to routeMiddleware array**
```
'pulsar.navTools' => \Syscover\NavTools\Middleware\NavTools::class,
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
NAVTOOLS_LANGS=en|es
```


### Set NAVTOOLS_COUNTRIES options on environment file .env
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
On app\Http\routes.php file use this closure to implement routes with translation

```
Route::group(['middleware' => ['pulsar.navTools']], function() {

    // write here your routes

});

```

#### Route configuration

You have several url configuration options depends on the chosen NAVTOOLS_URL_TYPE parameter:

Write your routes with lang variable

```
Route::group(['middleware' => ['pulsar.navTools']], function() {
    Route::get('/',                         function(){ return view('www.index'); });
    Route::get('{lang}',                  function(){ return view('www.index'); });
    Route::post('{lang}/contact',         ['as'=>'contact',  'uses'=>'FrontEndController@contact']);
});

```

Or set lang variable on your routes

```
Route::group(['middleware' => ['pulsar.navTools']], function() {
    Route::get('/',                   function(){ return view('www.index'); });

    Route::get('en',                  function(){ return view('www.index'); });
    Route::get('es',                  function(){ return view('www.index'); });

    Route::post('en/contact',         ['as' => 'contact-en',          'uses'=>'FrontEndController@contact']);
    Route::post('es/contacto',        ['as' => 'contact-es',          'uses'=>'FrontEndController@contact']);
});

```

Or set constant lang but country variable

```
Route::group(['middleware' => ['pulsar.navTools']], function() {
    Route::get('/',                   function(){ return view('www.index'); });

    Route::get('/en-{country}',                  function(){ return view('www.index'); });
    Route::get('/es-{country}',                  function(){ return view('www.index'); });

    Route::post('en-{country}'/contact',         ['as' => 'contact-en',          'uses'=>'FrontEndController@contact']);
    Route::post('es-{country}'/contacto',        ['as' => 'contact-es',          'uses'=>'FrontEndController@contact']);
});

```

Or use lang and country variables to get language value.

```
Route::group(['middleware' => ['pulsar.navTools']], function() {
    Route::get('/',                   function(){ return view('www.index'); });

    Route::get('/{lang}-{country}',                  function(){ return view('www.index'); });

    Route::post('/{lang}-{country}/contact',         ['as' => 'contact-en',          'uses'=>'FrontEndController@contact']);
});

```

### Get values in your application

You can get lang and country values with this helpers.
```
user_country(); // to get country user
user_lang(); // to get language user
```

To set routes you need to add lang or country parameters depending on NAVTOOLS_URL_TYPE.
```
route('routeName', ['lang' => 'en', 'country' => 'us']);
```

You can use a custom helper **nt_route()**, this helper inserts automatically variables lang and country, unless you specify these variables.
```
nt_route('routeName');
```

You can use **redirect()** helper without any trouble, we have extended Laravel core so that **redirect()->route()** does the same as **nt_route()**.

If you want to change the language or the country you must use this helpers
```
change_language('en');
change_country('us');
```

## License

The NavTools is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
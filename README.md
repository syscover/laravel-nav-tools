# Langlocale App to Laravel 5.2

## Installation

**1 - After install Laravel framework, insert on file composer.json, inside require object this value and execute composer update**
```
"syscover/langlocale": "~1.0"

```
execute on console:
```
composer install
```

**2 - Register service provider, on file config/app.php add to providers array**

```
Syscover\Langlocale\LanglocaleServiceProvider::class,

```

**3 - Register middlewares pulsar.langlocale on file app/Http/Kernel.php add to routeMiddleware array**

```
'pulsar.langLocale' => \Syscover\Langlocale\Middleware\LangLocale::class,

```

**4 - To publish package, you must type on console**

```
php artisan vendor:publish

```

**5 - Set config options on config\langlocale.php**
The best option is set options in environment file, with this example
```
LANGLOCALE_URL_TYPE=lang
LANGLOCALE_LANGS=en|es
LANGLOCALE_COUNTRIES=us|gb|es
LANGLOCALE_DEFAULT_COUNTRY=es
```

**6 - on app\Http\routes.php file use this cloure to implement routes with translation**

```
Route::group(['middleware' => ['pulsar.langLocale']], function() {

    // write here your routes

});

```

**7 - Route configuration**
you have several configuration options:

Write your routes with locale variable:

```
Route::group(['middleware' => ['pulsar.langlocale']], function() {
    Route::get('/',                         function(){ return view('www.index'); });
    Route::get('{locale}',                  function(){ return view('www.index'); });
    Route::post('{locale}/contact',         ['as'=>'contact',  'uses'=>'FrontEndController@contact']);
});

```

Set lang variable on your routes

```
Route::group(['middleware' => ['pulsar.langlocale']], function() {
    Route::get('/',                   function(){ return view('www.index'); });

    Route::get('en',                  function(){ return view('www.index'); });
    Route::get('es',                  function(){ return view('www.index'); });

    Route::post('en/contact',         ['as'=>'contact',          'uses'=>'FrontEndController@contact']);
    Route::post('es/contacto',        ['as'=>'contact',          'uses'=>'FrontEndController@contact']);
});

```

**8 - Get values in views**

You can get lang and country values with this helpers
```
user_country(); // to get country user
user_lang(); // to get language user
```
# Langlocale App to Laravel 5

## Installation

**1 - After install Laravel framework, insert on file composer.json, inside require object this value**
```
"syscover/langlocale": "dev-master"

```

**2 - Register service provider, on file config/app.php add to providers array**

```
'Syscover\Langlocale\LanglocaleServiceProvider',

```

**3 - Register middlewares langlocale.pulsar on file app/Http/Kernel.php add to routeMiddleware array**

```
'langlocale.pulsar' => 'Syscover\Langlocale\Middleware\SetLangLocaleUser',

```

**4 - To publish package, you must type on console**

```
php artisan vendor:publish --force

```

**5 - on app\Http\routes.php file use this cloure to implement routes with translation**

```
Route::group(['middleware' => ['langlocale.pulsar']], function() {

    // write here your routes

});

```
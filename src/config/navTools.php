<?php

return [
    /*
	|--------------------------------------------------------------------------
	| Url type
	|--------------------------------------------------------------------------
	|
	| Here you may configure your url type. You can need set across url
	| the language or locale or both.
	| If select false, the plugin will be deactivated
    |
	| Available Settings: 'lang', 'locale', 'langlocale', false
    |
    | Route example with langlocale option:
    | Route::get('en-us/init', function(){ return view('www.index'); });
    |
    | Route example with lang option:
    | Route::get('en/init', function(){ return view('www.index'); });
    |
    | Route example with locale option:
    | Route::get('us/init', function(){ return view('www.index'); });
	|
	*/

    'urlType' => env('LANGLOCALE_URL_TYPE', false),

    /*
	|--------------------------------------------------------------------------
	| Languages
	|--------------------------------------------------------------------------
	|
	| Available languages that you have in your web.
    | Values has in ISO 639-1.
    |
	| Example Settings: 'en', 'fr', 'de', 'es', 'ja', 'zh', 'ru', 'pt' etc.
    |
    | you can set with array or string to explode after
	|
	*/

    'langs' => explode('|', env('LANGLOCALE_LANGS', 'en|es')),


    /*
    |--------------------------------------------------------------------------
    | Countries
    |--------------------------------------------------------------------------
    |
    | Available countries that you have in your web.
    | Values has in ISO 3166.
    |
    | Example Settings: 'us', 'gb', 'fr', 'de', 'es', 'jp', 'cn', 'ru', 'pt' etc.
    |
    */

    'countries' => explode('|', env('LANGLOCALE_COUNTRIES', 'us|gb|es')),

    /*
    |--------------------------------------------------------------------------
    | Country
    |--------------------------------------------------------------------------
    |
    | Default country if don't find country
    |
    | Example Settings: 'us', 'gb', 'fr', 'de', 'es', 'jp', 'cn', 'ru', 'pt' etc.
    |
    */

    'defaultCountry' => env('LANGLOCALE_DEFAULT_COUNTRY', 'es'),

    /*
    |--------------------------------------------------------------------------
    | Countries Languages
    |--------------------------------------------------------------------------
    |
    | Countries according to the chosen language 'lang' => 'country'
    |
    */

    'countryLang' => ['en' => 'us', 'fr' => 'fr', 'de' => 'de', 'es' => 'es', 'ja' => 'jp', 'zn' => 'cn', 'ru' => 'ru', 'pt' => 'pt']

];
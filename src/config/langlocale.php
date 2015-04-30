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
	*/

    'urlType' => false,

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
	*/

    'langs' => ['en', 'es'],


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

    'countries' => ['us', 'gb', 'es'],

    /*
    |--------------------------------------------------------------------------
    | Countries Languages
    |--------------------------------------------------------------------------
    |
    | Countries according to the chosen language 'lang' => 'country'
    |
    | Example Settings: 'en' => 'us', 'fr' => 'fr', 'de' => 'de', 'es' => 'es', 'ja' => 'jp', 'zn' => 'cn', 'ru' => 'ru', 'pt' => 'pt' etc.
    |
    */

    'countryLang' => ['en' => 'us', 'es' => 'es']

];
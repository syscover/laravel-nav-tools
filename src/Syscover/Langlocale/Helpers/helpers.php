<?php

if (! function_exists('user_lang')) {
    /**
     * Get user lang from session.
     *
     * @return string
     */
    function user_lang()
    {
        return session('userLang') === null? config('app.locale') : session('userLang');
    }
}

if (! function_exists('user_country')) {
    /**
     * Get user country from session.
     *
     * @return string
     */
    function user_country()
    {
        return session('userCountry') === null? config('langlocale.defaultCountry') : session('userCountry');
    }
}

if (! function_exists('get_lang_route_name')) {
    /**
     * @param   string  $lang
     * @return  string
     */
    function get_lang_route_name($lang)
    {
        // TODO: desconocemos como se puede llamar el Request directamente, sin importarlo en el LanglocaleServiceProvider
        $routeName      = Request::route()->getName();
        $originRoute    = substr($routeName, 0, strlen($routeName) - 2);

        if(Route::has($originRoute . $lang))
            return $originRoute . $lang;
        else
            return $routeName;
    }
}

if (! function_exists('active_menu')) {
    /**
     * Get user country from session.
     *
     * @return string
     */
    function active_menu($routeName)
    {
        // TODO: desconocemos como se puede llamar el Request directamente, sin importarlo en el LanglocaleServiceProvider
        return Request::route()->getName() == $routeName;
    }
}
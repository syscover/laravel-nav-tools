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

if (! function_exists('get_lang_route')) {
    /**
     * Get user country from session.
     *
     * @return string
     */
    function get_lang_route($lang, $parameters = [])
    {
        // TODO: desconocemos el hecho que se pudeda llamar el Request directamente, sin importarlo en el LanglocaleServiceProvider
        $routeName      = Request::route()->getName();
        $originRoute    = substr($routeName, 0, strlen($routeName) - 2);

        return route($originRoute . $lang, $parameters);
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
        // TODO: desconocemos el hecho que se pudeda llamar el Request directamente, sin importarlo en el LanglocaleServiceProvider
        return Request::route()->getName() == $routeName;
    }
}
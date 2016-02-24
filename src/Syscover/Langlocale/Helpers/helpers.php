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

if (! function_exists('active_menu')) {
    /**
     * Get user country from session.
     *
     * @return string
     */
    function active_menu($routeName)
    {
        return Request::route()->getName() == $routeName;
    }
}
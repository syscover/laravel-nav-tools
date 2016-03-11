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
        $routeName      = Request::route()->getName();
        $originRoute    = substr($routeName, 0, strlen($routeName) - 2);

        if(Route::has($originRoute . $lang))
            return $originRoute . $lang;
        else
            // comprobamos si hay una ruta con el código de idioma
            if(Route::has($routeName . '-' . $lang))
                return $routeName . '-' . $lang;
            else
                return $routeName;
    }
}

if (! function_exists('active_menu')) {
    /**
     * Get user country from session.
     * @param   string      $routeName          name of route to check
     * @param   bool        $firstOccurrence    active to find first occurrence of route, this method is valid to active menu on subsections
     * @return  boolean
     */
    function active_menu($routeName, $firstOccurrence = false)
    {
        if($firstOccurrence)
            return strpos(Request::url(), route($routeName)) === 0;
        else
            return Request::route()->getName() == $routeName;
    }
}
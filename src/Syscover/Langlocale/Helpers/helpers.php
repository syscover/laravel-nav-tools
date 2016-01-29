<?php

use \App\Http\Requests\Request;

if (! function_exists('user_lang')) {
    /**
     * Assign user lang register.
     *
     * @return string
     */
    function user_lang(Request $request)
    {
        session('userLang');

        //return $array;
    }
}
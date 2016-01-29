<?php

if (! function_exists('user_lang')) {
    /**
     * Assign user lang register.
     *
     * @return string
     */
    function user_lang()
    {
        return session('userLang');

        //return $array;
    }
}
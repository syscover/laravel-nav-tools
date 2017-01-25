<?php namespace Syscover\NavTools\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Syscover\NavTools\Exceptions\ParameterFormatException;

class NavTools
{
    /**
     * @param   $request
     * @param   Closure $next
     * @return  mixed
     * @throws  ParameterFormatException
     */
    public function handle($request, Closure $next)
    {
        // if is false exit
        if(! config('navTools.urlType'))
            return $next($request);

        // get parameter navTools from URL
        $paramenters    = $request->route()->parameters();
        $lang           = null; // language variable
        $country        = null; // country variable


        //********************************************************
        // Instance lang or country variable by parameter
        //********************************************************
        // get lang variable from parameters
        if(isset($paramenters['lang']))
            $lang = $paramenters['lang'];

        // get country variable from parameters
        if(isset($paramenters['country']))
            $country = $paramenters['country'];


        //********************************************************
        // Instance lang or country variable by url
        //********************************************************
        if(
            $request->segment(1) !== null &&
            config('navTools.urlType') === 'lang-country' &&
            ($lang === null || $country === null)
        )
        {
            // get values implements in url
            $urlSegment = explode('-', $request->segment(1));

            if(count($urlSegment) !== 2)
                throw new ParameterFormatException('Not found lang and country parameter, you need implement lang and country parameters in you URL or change NAVTOOLS_URL_TYPE parameter');

            if($lang === null)
                $lang = $urlSegment[0];

            if($country === null)
                $country = $urlSegment[1];
        }
        elseif(
            $request->segment(1) !== null && (
                (config('navTools.urlType') === 'lang' && $lang === null) ||
                (config('navTools.urlType') === 'country' && $country === null)
            )
        )
        {
            if(config('navTools.urlType') === 'lang')
                $lang = $request->segment(1);
            elseif(config('navTools.urlType') === 'country')
                $country = $request->segment(1);
        }

        //********************************************************
        // Instance lang or country variable by browser language
        //********************************************************
        if($lang == null)
        {
            // Routine to know language and get header HTTP_ACCEPT_LANGUAGE if there is this variable.
            // the bots like google don't have this variable, in this case we have to complete language data.
            if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            {
                $browserLang = \Syscover\NavTools\Services\NavToolsService::preferentialLanguage(config('navTools.langs'));

                // instantiate browser language
                if(in_array($browserLang, config('navTools.langs')))
                    $lang = $browserLang;
            }
        }

        if($country == null && $lang !== null)
        {
            // if is set locale, we get default country from locale
            if(isset(config('navTools.countryLang')[$lang]))
            {
                // in the case we take the country as default language
                $country = config('navTools.countryLang')[$lang];
            }
        }

        // Check exceptions
        if($lang != null && ! in_array($lang, config('navTools.langs')))
            throw new ParameterFormatException('Variable lang is not valid value, check NAVTOOLS_LANGS in your environment');

        if($country != null && ! in_array($country, config('navTools.countries')))
            throw new ParameterFormatException('Variable country is not valid value, check NAVTOOLS_COUNTRIES in your environment');


        //****************
        // Set sessions
        //****************
        if (config('navTools.urlType') == 'lang-country')
        {
            session(['userLang'     => $lang]);
            session(['userCountry'  => $country]);
        }
        elseif(config('navTools.urlType') == 'lang')
        {
            session(['userLang' => $lang]);
        }
        elseif(config('navTools.urlType') == 'country')
        {
            session(['userCountry' => $country]);
        }
        // routine to set variables if we have cookies, set in session variables
        elseif($request->cookie('userLang') != null )
        {
            session('userLang', $request->cookie('userLang'));
        }
        elseif($request->cookie('userCountry') != null)
        {
            session('userCountry', $request->cookie('userCountry'));
        }


        //**********************************
        // Set application language
        //**********************************
        if(
            config('navTools.urlType') == 'lang-country' ||
            config('navTools.urlType') == 'lang'
        )
        {
            App::setLocale(user_lang());
        }

        return $next($request);
    }
}
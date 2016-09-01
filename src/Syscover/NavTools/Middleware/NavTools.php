<?php namespace Syscover\NavTools\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class NavTools
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if is false exit
        if(! config('navTools.urlType'))
            return $next($request);

        if($request->segment(1) != null)
        {
            if(config('navTools.urlType') == 'navTools')
            {
                $navToolsData = explode('-', $request->segment(1));
            }
            elseif(config('navTools.urlType') == 'lang' || config('navTools.urlType') == 'country')
            {
                $navToolsData = $request->segment(1);
            }
        }
        else
        {
            $navToolsData = [];
        }

        // routine to establish country and language variables in session, with URL data language and country
        if (config('navTools.urlType') == 'lang-country' && count($navToolsData) == 2 && in_array($navToolsData[0], config('navTools.langs')) && in_array($navToolsData[1], config('navTools.countries')))
        {
            session(['userLang'     => $navToolsData[0]]);
            session(['userCountry'  => $navToolsData[1]]);
        }
        // when only we need know user language
        elseif(config('navTools.urlType') == 'lang' && in_array($navToolsData, config('navTools.langs')))
        {
            session(['userLang' => $navToolsData]);
        }
        // when only we need know user country
        elseif(config('navTools.urlType') == 'country' && in_array($navToolsData, config('navTools.countries')))
        {
            session(['userCountry' => $navToolsData]);
        }
        // routine to set variables if we have cookies, set in session variables
        elseif($request->cookie('userLang') != null && $request->cookie('userCountry') != null)
        {
            session('userLang',     $request->cookie('userLang'));
            session('userCountry',  $request->cookie('userCountry'));
        }

        // routine to set session variables without cookies
        elseif(session('userLang') == null || session('userCountry') == null)
        {
            if(config('navTools.urlType') == 'lang-country' || config('navTools.urlType') == 'lang')
            {
                // Routine to know language
                // get header HTTP_ACCEPT_LANGUAGE if there is this variable,
                // the bots like google don't have this variable, in this case we have to complete language data.
                if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
                {
                    $browserLang = \Syscover\NavTools\Libraries\NavToolsLibrary::preferedLanguage(config('navTools.langs'));

                    // instantiate browser language
                    if(in_array($browserLang, config('navTools.langs')))
                    {
                        $lang = $browserLang;
                    }
                    else
                    {
                        $lang = config('app.locale');
                    }
                }
                else
                {
                    // in this case, ser default lang
                    $lang = config('app.locale');
                }

                // set user lang on session
                session(['userLang' => $lang]);
            }


            if(config('navTools.urlType') == 'lang-country' || config('navTools.urlType') == 'country')
            {
                // if is set locale, we get default country from locale
                if(config('navTools.urlType') == 'lang-country' || config('navTools.urlType') == 'lang')
                {
                    // in the case of not getting a valid country, we take the country as default language
                    $country = config('navTools.countryLang')[$lang];
                }
                else
                {
                    $country = config('navTools.defaultCountry');
                }

                session(['userCountry' => $country]);
            }
        }

        if(config('navTools.urlType') == 'lang-country' || config('navTools.urlType') == 'lang')
        {
            // We establish the language environment
            App::setLocale(user_lang());
        }

        return $next($request);
    }
}
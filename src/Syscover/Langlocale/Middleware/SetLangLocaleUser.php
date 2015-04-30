<?php namespace Syscover\Langlocale\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLangLocaleUser {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!config('langlocale.urlType')) return $next($request);

        if($request->segment(1) != null)
        {
            if(config('langlocale.urlType') == 'langlocale')
            {
                $langLocaleData = explode("-", $request->segment(1));
            }
        }
        else
        {
            $langLocaleData = [];
        }


        // routine to establish country and language variables in session, with URL data language and country
        if (config('langlocale.urlType') == 'langlocale' && count($langLocaleData) == 2 && in_array($langLocaleData[0], config('langlocale.langs')) && in_array($langLocaleData[1], config('langlocale.countries')))
        {
            session('langUser',     $langLocaleData[0]);
            session('countryUser',  $langLocaleData[1]);
        }

        // routine to set variables if we have cookies, set in session variables
        elseif(cookie('langUser') != null && cookie('countryUser') != null)
        {
            session('langUser',     cookie('langUser'));
            session('countryUser',  cookie('countryUser'));
        }

        // routine to set session variables without cookies
        elseif (session('langUser') == null || sessison('countryUser') == null)
        {
            // Routine to know language
            // get header HTTP_ACCEPT_LANGUAGE if there is this variable,
            // the bots like google don't have this variable, in this case we have to complete language data.

            if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            {
                $browserLang = Syscover\Langlocale\Libraries\Miscellaneous::preferedLanguage(config('langlocale.langs'));

                // instantiate browser language
                if(in_array($browserLang, config('langlocale.langs')))
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

            // Routine to know country
            // We find out the client's IP
            $ip = Syscover\Langlocale\Libraries\Miscellaneous::getRealIp();
            $browserCountry = Syscover\Langlocale\Libraries\Miscellaneous::getCountryIp($ip);

            if (in_array($browserCountry, Config::get('web.webCountry')))
            {
                $country = $browserCountry;
            }
            else
            {
                //en el caso de no obtener un país válido, cogemos el país por defecto según el idioma
                $country = Config::get('web.countryLang')[$lang];
            }



            //session('langUser', $language);
            //session('countryUser', $country);
        }

        // we establish the language environment
        echo('resultado: '.session('langUser'));
        App::setLocale(session('langUser'));

        //return $next($request);
    }
}
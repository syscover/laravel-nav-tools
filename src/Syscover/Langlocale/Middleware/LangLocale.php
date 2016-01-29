<?php namespace Syscover\Langlocale\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LangLocale
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
        if(!config('langlocale.urlType')) return $next($request);

        if($request->segment(1) != null)
        {
            if(config('langlocale.urlType') == 'langlocale')
            {
                $langLocaleData = explode("-", $request->segment(1));
            }
            elseif(config('langlocale.urlType') == 'lang' || onfig('langlocale.urlType') == 'locale')
            {
                $langLocaleData = $request->segment(1);
            }
        }
        else
        {
            $langLocaleData = [];
        }


        // routine to establish country and language variables in session, with URL data language and country
        if (config('langlocale.urlType') == 'langlocale' && count($langLocaleData) == 2 && in_array($langLocaleData[0], config('langlocale.langs')) && in_array($langLocaleData[1], config('langlocale.countries')))
        {
            session(['userLang'     => $langLocaleData[0]]);
            session(['userCountry'  => $langLocaleData[1]]);
        }
        // when only we need know user language
        elseif(config('langlocale.urlType') == 'lang' && in_array($langLocaleData, config('langlocale.langs')))
        {
            session(['userLang' => $langLocaleData]);
        }
        // when only we need know user country
        elseif(config('langlocale.urlType') == 'locale' && in_array($langLocaleData, config('langlocale.countries')))
        {
            session(['userCountry' => $langLocaleData]);
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
            if(config('langlocale.urlType') == 'langlocale' || config('langlocale.urlType') == 'lang')
            {
                // Routine to know language
                // get header HTTP_ACCEPT_LANGUAGE if there is this variable,
                // the bots like google don't have this variable, in this case we have to complete language data.
                if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
                {
                    $browserLang = \Syscover\Langlocale\Libraries\Miscellaneous::preferedLanguage(config('langlocale.langs'));

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

                session(['userLang' => $lang]);
            }


            if(config('langlocale.urlType') == 'langlocale' || config('langlocale.urlType') == 'locale')
            {
                // if is set locale, we get default country from locale
                if(config('langlocale.urlType') == 'langlocale' || config('langlocale.urlType') == 'lang')
                {
                    // in the case of not getting a valid country, we take the country as default language
                    $country = config('langlocale.countryLang')[$lang];
                }
                else
                {
                    $country = config('langlocale.defaultCountry');
                }

                session(['userCountry' => $country]);
            }
        }

        if(config('langlocale.urlType') == 'langlocale' || config('langlocale.urlType') == 'lang')
        {
            // we establish the language environment
            App::setLocale(session('userLang'));
        }

        return $next($request);
    }
}
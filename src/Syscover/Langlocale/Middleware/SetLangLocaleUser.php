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
        // get lang property
        if($request->segment(1) != null)
        {
            $langLocaleData = explode("-", $request->segment(1));
        }
        else
        {
            $langLocaleData = [];
        }

        // routine to establish country and language variables in session, with URL data country and language
        if (count($langLocaleData) == 2 && in_array($langLocaleData[0], config('web.webLang')) && in_array($langLocaleData[1], config('web.webCountry')))
        {
            session('langUser', $datos[0]);
            session('countryUser', $datos[1]);
        }

        // routine to set variables if we have cookies, set in session variables
        elseif(cookie('langUser') != null && cookie('countryUser') != null)
        {
            session('langUser', cookie('langUser'));
            session('countryUser', cookie('countryUser'));
        }

        // routine to set session variables without cookies
        elseif (session('langUser') == null || sessison('countryUser') == null)
        {



            // RUTINA PARA AVERIGUAR EL LENGUAJE
            // revisamos cabecera HTTP_ACCEPT_LANGUAGE y si dispone de esta variable,
            // los buscadores como google no disponen de esta variable, por lo que hay que contemplar el no encontrarla.


            /****
            if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
            {
            //$browserLang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
            $browserLang = Pulsar\Pulsar\Libraries\Miscellaneous::preferedLanguage(Config::get('web.webLang'));

            //instanciamos el idioma del navegador, y nos aseguramos de instanciar un pais según el idioma del navegador en caso de no estar instanciado
            if(in_array($browserLang, Config::get('web.webLang')))
            {
            $language = $browserLang;
            }
            else
            {
            $language = Config::get('web.defaultLang');
            }
            }
            else
            {
            //en caso de no detectar dicha variable, la instanciamos el idioma por defecto
            $language = Config::get('web.defaultLang');
            }

            // RUTINA PARA AVERIGUAR EL PAÍS
            // averiguamos la IP del cliente
            $ip = Pulsar\Pulsar\Libraries\Miscellaneous::getRealIp();
            $browserCountry = Pulsar\Pulsar\Libraries\Miscellaneous::getCountryIp($ip);

            if (in_array($browserCountry, Config::get('web.webCountry')))
            {
            $country = $browserCountry;
            }
            else
            {
            //en el caso de no obtener un país válido, cogemos el país por defecto según el idioma
            $country = Config::get('web.countryLang')[$language];
            }
             *****/


            //session('langUser', $language);
            //session('countryUser', $country);
        }

        // establish environment language
        App::setLocale(session('langUser'));

        return $next($request);
    }
}
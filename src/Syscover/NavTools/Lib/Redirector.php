<?php namespace Syscover\NavTools\Lib;

use Illuminate\Routing\UrlGenerator;

class Redirector extends \Illuminate\Routing\Redirector
{
    /**
     * Create a new Redirector instance.
     *
     * @param  \Illuminate\Routing\UrlGenerator  $generator
     */
    public function __construct(UrlGenerator $generator)
    {
        parent::__construct($generator);

        // fixed error in Redirector guest function.
        // when try to access to session, don't exist, we must create before
        if(! isset($this->session))
            $this->setSession(session()->driver());
    }

    /**
     * Create a new redirect response to a named route.
     *
     * @param  string  $route
     * @param  array   $parameters
     * @param  int     $status
     * @param  array   $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function route($route, $parameters = [], $status = 302, $headers = [])
    {
        $path = nt_route($route, $parameters);

        return $this->to($path, $status, $headers);
    }
}
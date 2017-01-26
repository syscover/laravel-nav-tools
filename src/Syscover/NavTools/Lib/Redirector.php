<?php namespace Syscover\NavTools\Lib;

class Redirector extends \Illuminate\Routing\Redirector
{
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
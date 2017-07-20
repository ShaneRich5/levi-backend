<?php

namespace App\Http\Middleware;

use Closure;

class ConvertKeysToSnakeCase
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
        $inputs = $request->all();

        $request->merge(array_map(array($this, 'convertKey'), $inputs));

        return $next($request);
    }

    function convertKey($key, $value) {
        return lcfirst(implode('', array_map('ucfirst', explode('_', $key))));
    }
}

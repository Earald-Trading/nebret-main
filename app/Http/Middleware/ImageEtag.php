<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ImageEtag
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // see \Illuminate\Http\Middleware\SetCacheHeaders
        $response = $next($request);

        $options['etag'] = md5($response->getContent());

        $response->setCache($options);
        $response->isNotModified($request);

        return $response;
    }
}

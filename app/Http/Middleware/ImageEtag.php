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

        $path = $response->getFile()->getPath();
        $size = $response->getFile()->getSize();
        $atime = $response->getFile()->getMtime();

        $options['etag'] = md5("{$path} {$size} {$atime}");

        $response->setCache($options);
        $response->isNotModified($request);

        return $response;
    }
}

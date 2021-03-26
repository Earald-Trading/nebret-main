<?php
use Illuminate\Support\Facades\Request;

if (! function_exists('query_without')) {
    /**
     * remove a query from the current url
     *
     * @param  string  $name
     * @param  string  $query
     * @return string
     */
    function query_without($query)
    {
        $requst_query = Request::query();
        unset($requst_query[$query]);
        return $requst_query;
    }
}

if (! function_exists('query')) {
    /**
     * Query a route with the current query added
     *
     * @param  string  $name
     * @param  array  $query
     * @return string
     */
    function query($name, $query = [])
    {
        $requst_query = query_without('page');
        return route($name, array_merge($requst_query, $query));
    }
}

if (! function_exists('query_remove')) {
    /**
     * remove a query from the current url
     *
     * @param  string  $name
     * @param  string  $query
     * @return string
     */
    function query_remove($name, $query)
    {
        $requst_query = query_without($query);
        return route($name, $requst_query);
    }
}

<?php
if (!function_exists('get_phrase')) {
    function get_phrase($phrase = ''): string
    {
        $phrase = ucwords(implode('_', preg_split("/[\s,]+/", trim($phrase))));
        return ucwords(str_replace('_', ' ', $phrase));
    }
}
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active open")
    {
        if (in_array(Route::currentRouteName(), $routes)) {
            return $output;
        }
    }
}

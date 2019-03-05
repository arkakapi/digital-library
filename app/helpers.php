<?php
/**
 * Created by PhpStorm.
 * User: omer
 * Date: 3/5/2019
 * Time: 23:48
 */

// Get other route names himself
function getRouteName($route)
{
    $routes = explode('.', Route::currentRouteName());
    return $routes[0] . '.' . $routes[1] . '.' . $route;
}

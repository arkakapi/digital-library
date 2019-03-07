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

// Get parent route for active menu class
function getParentRouteName()
{
    $routes = explode('.', Route::currentRouteName());
    return $routes[0] . '.' . $routes[1];
}

// Get published issues by year
function getPublishedIssuesByYear($issues, $language, $start, $limit)
{
    return $issues->filter(function ($issue) use ($start, $limit, $language) {
        return $issue->issue >= $start && $issue->issue < $limit && $issue->language == $language;
    })->map(function ($issue) {
        return $issue->issue;
    })->toArray();
}

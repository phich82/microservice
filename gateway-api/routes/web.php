<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/**
 * Routes for authors
 */
$router->group(['prefix' => 'authors'], function ($e) use ($router) {
    $router->get('/', "AuthorController@index");
    $router->post('/', "AuthorController@store");
    $router->get('/{id}', "AuthorController@show");
    $router->put('/{id}', "AuthorController@update");
    $router->patch('/id}', "AuthorController@update");
    $router->delete('/{id}', "AuthorController@destroy");
});

/**
 * Routes for books
 */
$router->group(['prefix' => 'books'], function ($e) use ($router) {
    $router->get('/', "BookController@index");
    $router->post('/', "BookController@store");
    $router->get('/{id}', "BookController@show");
    $router->put('/{id}', "BookController@update");
    $router->patch('/id}', "BookController@update");
    $router->delete('/{id}', "BookController@destroy");
});

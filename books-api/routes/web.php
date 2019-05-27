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

$router->group(['prefix' => 'books'], function ($e) use ($router) {
    $router->get('/', "BookController@index");
    $router->post('/', "BookController@store");
    $router->get('/{id}', "BookController@show");
    $router->put('/{id}', "BookController@update");
    $router->patch('/id}', "BookController@update");
    $router->delete('/{id}', "BookController@destroy");
});

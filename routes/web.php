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


$router->get('/u' , 'User\LoginController@login');

$router->get('/order' , 'Order\OrderController@index');

$router->get('/curl/test' , 'Curl\CurlController@curl');
$router->post('/curl/test' , 'Curl\CurlController@curl');

//$router->get('/rsa/test' , 'Curl\CurlController@test');
$router->post('/rsa/test' , 'Curl\CurlController@test');

$router->get('/login' , 'User\LoginController@login');
$router->post('/login' , 'User\LoginController@login');
<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {
    // Auth routes
    $router->post('login', ['uses' => 'AuthController@login']);
    $router->post('logout', ['uses' => 'AuthController@logout']);
    $router->post('refresh', ['uses' => 'AuthController@refresh']);
    $router->post('user-profile', ['uses' => 'AuthController@me']);

    // Siswa CRUD
    $router->post('siswa/create', ['uses' => 'SiswaController@create']);
    $router->get('siswa/read', ['uses' => 'SiswaController@read']);
    $router->put('siswa/update/{id}', ['uses' => 'SiswaController@update']);
    $router->delete('siswa/delete/{id}', ['uses' => 'SiswaController@delete']);

    // Guru CRUD
    $router->post('guru/create', ['uses' => 'GuruController@create']);
    $router->get('guru/read', ['uses' => 'GuruController@read']);
    $router->put('guru/update/{id}', ['uses' => 'GuruController@update']);
    $router->delete('guru/delete/{id}', ['uses' => 'GuruController@delete']);

    // Kelas CRUD
    $router->post('kelas/create', ['uses' => 'KelasController@create']);
    $router->get('kelas/read', ['uses' => 'KelasController@read']);
    $router->put('kelas/update/{id}', ['uses' => 'KelasController@update']);
    $router->delete('kelas/delete/{id}', ['uses' => 'KelasController@delete']);
});

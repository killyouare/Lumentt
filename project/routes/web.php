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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/course_users', 'CourseUserController@create');
    $router->get('/course_lessons', 'LessonController@index');
    $router->put('course_lesson_users/{id}', 'LessonUserController@update');

    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/register', 'UserController@register');
        $router->get('/login', 'UserController@login');

        $router->group(['prefix' => '{id}'], function () use ($router) {
            $router->delete('', 'UserController@delete');
            $router->put('', 'UserController@change');
        });
    });

    $router->group(['prefix' => 'courses'], function () use ($router) {
        $router->get('', 'CourseController@index');
        $router->post('', 'CourseController@create');
    });
});

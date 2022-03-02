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
$router->group([
    'prefix' => 'api'
], function () use ($router) {
    $router->get('/course_lessons', 'LessonController@index');
    $router->get('/courses', 'CourseController@index');

    $router->group([
        'prefix' => 'users'
    ], function () use ($router) {
        $router->post('/register', 'AuthController@register');
        $router->post('/login', 'AuthController@login');
    });
});

$router->group([
    'prefix' => 'api',
    'middleware' => 'auth'
], function () use ($router) {
    $router->get('/course_users', ['middleware' => 'user', 'CourseUserController@create']);
    $router->put('course_lesson_users/{id}', ['middleware' => 'user', 'LessonUserController@update']);
    $router->post('/courses', ['middleware' => 'admin', 'CourseController@create']);

    $router->group([
        'prefix' => 'users'
    ], function () use ($router) {
        $router->get('', ['middleware' => 'admin', 'UserController@index']);

        $router->group([
            'prefix' => '{id}',
            'middleware' => ['user', 'owner']
        ], function () use ($router) {
            $router->delete('', 'UserController@delete');
            $router->put('', 'UserController@change');
        });
    });
});
$router->get('/', 'UserController@index');

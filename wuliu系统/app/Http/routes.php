<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


// 无需授权的部分
Route::group(['middleware' => ['web']], function () {
    // 首页
    Route::get('/', 'HomeController@index');

    // 用户登录和注册
    Route::get('user/login', 'UserController@getLogin');
    Route::post('user/login', 'UserController@postLogin');
    Route::get('user/register', 'UserController@getRegister');
    Route::post('user/register', 'UserController@postRegister');
    Route::get('user/logout', 'Usercontroller@logout');
    Route::get('user/findpassword', 'Usercontroller@getFindpassword');
    Route::post('user/findpassword', 'Usercontroller@postFindpassword');

    // supply部分
    Route::get('/supply/{id}', 'SupplyController@index')->where(['id' => '[0-9]+']);
    Route::get('/supply/s/{type}', 'SupplyController@s');
    Route::get('/supply/page/{type}', 'SupplyController@page');

    // demand部分;
    Route::get('/demand/{id}', 'DemandController@index')->where(['id' => '[0-9]+']);
    Route::get('/demand/s/{type}', 'DemandController@s');
    Route::get('/demand/page/{type}', 'DemandController@page');

});

// 需要授权的部分
Route::group(['middleware' => ['web', 'user']], function () {
    // supply部分
    Route::get('/supply/create/{type}', 'SupplyController@getCreate');
    Route::post('/supply/create/{type}', 'SupplyController@postCreate');
    Route::get('/supply/edit/{id}', 'SupplyController@getEdit')->where(['id' => '[0-9]+']);
    Route::post('/supply/edit/{id}', 'SupplyController@postEdit')->where(['id' => '[0-9]+']);

    // demand部分
    Route::get('/demand/create/{type}', 'DemandController@getCreate');
    Route::post('/demand/create/{type}', 'DemandController@postCreate');
    Route::get('/demand/edit/{id}', 'DemandController@getEdit')->where(['id' => '[0-9]+']);
    Route::post('/demand/edit/{id}', 'DemandController@postEdit')->where(['id' => '[0-9]+']);

    // 用户部分
    Route::get('user', 'UserController@getInfo');
    Route::post('user', 'UserController@postInfo');
    Route::get('user/password', 'UserController@getPassword');
    Route::post('user/password', 'UserController@postPassword');
    Route::get('user/supply', 'UserController@supply');
    Route::get('user/demand', 'UserController@demand');

    // 查看合作意向
    Route::get('/cooperation/page/{type}', 'CooperationController@page');

    // 查看订阅消息
    Route::get('subscribe/page/{$type}', 'SubscribeController@page');
});

// Ajax接口部分
Route::group(['middleware' => ['ajax', 'user']], function () {
    // 图片上传
    Route::post('upload/image', 'UploadController@image');

    // 发布合作意向
    Route::post('cooperation/supply/{id}', 'CooperationController@supply');
    Route::post('cooperation/demand/{id}', 'CooperationController@demand');

    // 发布留言
    Route::post('message/submit/supply/{id}','MessageController@supply');
    Route::post('message/submit/demand/{id}','MessageController@demand');
});




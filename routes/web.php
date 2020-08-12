<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->namespace('Admin')->prefix('admin')->group(function () {
    Route::resource('users', 'UsersController');
    Route::resource('courses', 'CourseController');
    Route::resource('{course}/lessons', 'LessonController');
    Route::resource('{lesson}/questions', 'QuestionController');
    Route::resource('{question}/answers', 'AnswerController');
    Route::get('{lesson}/questions/create/excel', 'QuestionController@createExcel');
    Route::get('/', 'IndexController@index');
});

Route::get('lang/{locale}', 'LocalizationController@index');

Route::middleware(['web'])->group(function () {
    Route::get('media/{file_name}', 'MediaController@getImage')->where('file_name', '.*');
    Route::get('media_avatar/{file_name}', 'MediaController@getAvatar')->where('file_name', '.*');
    Route::get('media_doc/{file_name}', 'MediaController@getFile')->where('file_name', '.*');
    Route::get('media_content/{file_name}', 'MediaController@getContentImage')->where('file_name', '.*');
    Route::post('content_image', 'MediaController@storeContentImage');
});

Route::middleware(['web', 'auth'])->namespace('Index')->group(function () {
    Route::get('/', 'ProfileController@index');
    Route::get('profile', 'ProfileController@index');
    Route::get('change-password', 'ProfileController@changePassword');
    Route::post('profile-password', 'ProfileController@profileChangePassword');
    Route::get('profile-edit', 'ProfileController@edit');
    Route::post('update-profile', 'ProfileController@update');
    Route::get('user-courses', 'ProfileController@courses');
    Route::get('course/{lesson}/lessons', 'ProfileController@lesson');
    Route::get('lesson/{question}/test', 'TestController@index');
    Route::post('answer/{question}', 'TestController@userAnswer');
    Route::get('finish/{lesson}', 'TestController@finish');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'home.index', 'uses' => 'HomeController@index'
]);

Route::resource('files', 'FileController');

Route::get('files/download/{file}', [
    'as' => 'files.download',
    'uses' => 'FileController@download',
]);

Route::resource('folders', 'FolderController');


Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');

Route::post('/2fa', function () {
    return redirect(route('home.index'));
})->name('2fa')->middleware('2fa');

Auth::routes();


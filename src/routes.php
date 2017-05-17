<?php


Route::group(['middleware' => ['web']], function() {
  Route::get('/contact', 'Janiscp\AdminlteStarter\ContactController@vueCrud');
  Route::resource('vueitems','Janiscp\AdminlteStarter\ContactController');
});


Route::get('/calendar', function () {
    return view('adminlte::track');
});
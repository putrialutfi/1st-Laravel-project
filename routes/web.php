<?php

Route::group(['middleware' => ['web']], function() {

    //Auth::routes();
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('register', function() {
      return redirect ('/login');
    });

    Route::get('admins/item/cari', 'ItemController@cari');
    Route::resource('admins/item', 'ItemController');
    Route::get('admins/order/cari', 'NotifController@cari');
    Route::resource('admins/order', 'NotifController');
    Route::get('admins/order/{order}/edit/ajax/{ids}', 'NotifController@withAjax');
    Route::resource('admins/akun', 'AkunController');
    Route::resource('admins/contoh', 'ContohController');
});

Route::get('register', function() {
  return redirect ('/login');
});
Route::get('/home', 'HomeController@index');
Route::get('/', 'PagesController@beforeLogin');
Route::get('/admins', 'PagesController@afterLogin');
Route::get('portofolio', 'PagesController@portofolio');
Route::get('portofolio/{portofolio}', 'PagesController@show');
Route::resource('order', 'OrderController');
Route::get('order/ajax/{id}', 'OrderController@withAjax');

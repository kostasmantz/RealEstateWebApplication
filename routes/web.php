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

//Login - Logout route
Route::post('login',array('uses'=>'LoginController@doLogin'));
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Home routes
Route::get('/','ListingController@index')->name('listing');
Route::get('/home', 'ListingController@getNewListings')->name('newListings');

// About routes 
Route::get('/about', function () {
    return view('about');
});

// Properties routes
Route::get('/myproperties','ListingController@getUserListings')->name('myListings');
Route::get('/findResults', function () {
    return view('findResults');
});

Route::get('/findProperty', function () {
    return view('findProperty');
});

//AddProperty routes
Route::get('/addproperty', function () {
    return view('properties.addproperty');
});
Route::post('addProperty','ListingController@store')->name('addProperty');

Auth::routes();

Route::get('/findResults','ListingController@requestListings')->name('searchListings');
Route::post('findResults','ListingController@requestListings');
Route::resource('listing','ListingController');

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/editproperty/{listingId}','ListingController@showMyListing')->name('listing');



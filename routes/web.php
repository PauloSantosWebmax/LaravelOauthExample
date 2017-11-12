<?php

// homepage
Route::view('/', 'index')->name('index');

/**
 * Social login oauth2.0
 */
Route::group([
    'prefix' => 'social',
], function () {
    Route::get('/{provider?}', 'SocialController@getSocialAuth')->name('social.facebook.login');
    Route::get('/callback/{provider?}', 'SocialController@getSocialAuthCallback');
});

/**
 * Auth routes
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

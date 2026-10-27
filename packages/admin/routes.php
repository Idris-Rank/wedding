<?php

defined('DS') or exit('No direct access.');

Route::get('(:package)/login', 'admin::auth@login');
Route::post('(:package)/login', ['before' => 'csrf|throttle:10,1', 'uses' => 'admin::auth@authenticate']);
Route::post('(:package)/logout', ['before' => 'csrf|auth', 'uses' => 'admin::auth@logout']);

Route::group(['before' => 'auth'], function () {
    Route::get('(:package)', 'admin::dashboard@index');
    Route::get('(:package)/wedding', 'admin::wedding@index');
    Route::get('(:package)/events', 'admin::event@index');
    Route::get('(:package)/events/create', 'admin::event@create');
    Route::get('(:package)/events/(:num)/edit', 'admin::event@edit');
    Route::get('(:package)/galleries', 'admin::gallery@index');
    Route::get('(:package)/galleries/create', 'admin::gallery@create');
    Route::get('(:package)/galleries/(:num)/edit', 'admin::gallery@edit');
    Route::get('(:package)/gifts', 'admin::gift@index');
    Route::get('(:package)/gifts/create', 'admin::gift@create');
    Route::get('(:package)/gifts/(:num)/edit', 'admin::gift@edit');
    Route::get('(:package)/rsvps', 'admin::rsvp@index');
    Route::post('(:package)/wedding', ['before' => 'csrf', 'uses' => 'admin::wedding@update']);
    Route::post('(:package)/wedding/media/(:any)/delete', ['before' => 'csrf', 'uses' => 'admin::wedding@delete_media']);
    Route::post('(:package)/events', ['before' => 'csrf', 'uses' => 'admin::event@store']);
    Route::post('(:package)/events/(:num)/update', ['before' => 'csrf', 'uses' => 'admin::event@update']);
    Route::post('(:package)/events/(:num)/delete', ['before' => 'csrf', 'uses' => 'admin::event@delete']);
    Route::post('(:package)/galleries', ['before' => 'csrf', 'uses' => 'admin::gallery@store']);
    Route::post('(:package)/galleries/(:num)/update', ['before' => 'csrf', 'uses' => 'admin::gallery@update']);
    Route::post('(:package)/galleries/(:num)/delete', ['before' => 'csrf', 'uses' => 'admin::gallery@delete']);
    Route::post('(:package)/gifts', ['before' => 'csrf', 'uses' => 'admin::gift@store']);
    Route::post('(:package)/gifts/(:num)/update', ['before' => 'csrf', 'uses' => 'admin::gift@update']);
    Route::post('(:package)/gifts/(:num)/delete', ['before' => 'csrf', 'uses' => 'admin::gift@delete']);
    Route::post('(:package)/rsvps/(:num)/delete', ['before' => 'csrf', 'uses' => 'admin::rsvp@delete']);
});

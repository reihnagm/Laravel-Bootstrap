<?php

// ADMINISTRATIVE
Route::namespace('Administrative')->group(function() {
    Route::get('/information/get/regencies/{id}', 'AdministrativeController@regencies')->name('regencies');
    Route::get('/information/get/districts/{id}', 'AdministrativeController@districts')->name('districts');
    Route::get('/information/get/villages/{id}', 'AdministrativeController@villages')->name('villages');
});

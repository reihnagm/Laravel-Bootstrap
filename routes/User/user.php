<?php

Route::namespace('User')->group(function() {
    // UPDATE PROFILE USER
    Route::get('/', 'UserController@index')->name('user')->middleware('verified');
    Route::put('/user/update', 'UserController@update')->name('user.update');

    // PHOTO
    Route::post('/user/upload/photo/profile', 'UserController@update_photo_profile')->name('user.upload.photo.profile');
    Route::delete('/user/destroy/photo/profile', 'UserController@destroy_photo_profile')->name('user.destroy.photo.profile');

    // EDUCATION
    Route::get('/user/education/edit/{id}', 'UserController@get_education')->name('user.education.edit');
    Route::put('/user/education/update/{id}', 'UserController@update_education')->name('user.education.update');
    Route::post('/user/education/add', 'UserController@add_education')->name('user.education.add');
    Route::delete('/user/education/destroy/{id}', 'UserController@destroy_education')->name('user.education.destroy');

    // WORK
    Route::get('/user/work/edit/{id}', 'UserController@get_work')->name('user.work.get');
    Route::put('/user/work/update/{id}', 'UserController@update_work')->name('user.work.update');
    Route::post('/user/work/add', 'UserController@add_work')->name('user.work.add');
    Route::delete('/user/work/destroy/{id}', 'UserController@destroy_work')->name('user.work.destroy');

    // ADDRESS
    Route::put('/user/address/update/{id}', 'UserController@update_address')->name('user.address.update');

    // DATATABLE
    Route::get('/user/datatable', 'UserController@datatable_user')->name('user.datatable');

    // EXPORT EXCEL
    Route::get('/user/export-excel', 'UserController@export_excel')->name('user.export.excel');

    // SEND MAIL
    Route::get('/user/send-mail', 'UserController@send_mail');
});

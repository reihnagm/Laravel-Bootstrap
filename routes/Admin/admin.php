<?php

Route::namespace('Admin')->group(function() {
    // ADMIN DASHBOARD
    Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard')->middleware('admin');

    // DATATABLE USER
    Route::get('/admin/datatable-user', 'AdminController@dataTableUser')->name('admin.datatable.user');
});

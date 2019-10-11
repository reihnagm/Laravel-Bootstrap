<?php

use \Illuminate\Support\Facades\URL;
use \Illuminate\Http\Request;

Route::get("/test", function() {
    return view('test');
});

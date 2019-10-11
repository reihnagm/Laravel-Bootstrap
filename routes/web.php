<?php

// NEW FEATURES LARAVEL 5.7 & 5.8 UPDATE
// VERIFICATION EMAIL
Auth::routes(['verify' => true]);

    // $paramVegetableId = $request->vegetableId;
    //
    // $draw  = $request->draw;
    // $start = $request->start;
    // $length = $request->length;
    // $search = $request['search']['value'];
    //
    // $total = \App\Models\Food::count();
    //
    // $output = [];
    //
    // $output['draw'] = $draw;
    // $output['recordsTotal'] = $output['recordsFiltered'] = $total;
    //
    // $output['data'] = [];
    //
    // $queryDishes = \App\Models\Food::where('id', $paramVegetableId)->orderBy('name', 'DESC')->offset($start)->limit($length)->get();
    //
    // return response()->json($queryDishes);

Route::get('/test', function () {
    $ip = getUserIp();
    dd($ip);
});

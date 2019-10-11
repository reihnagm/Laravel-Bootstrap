<?php

use Illuminate\Http\Request;

Route::get('/datatables', function () {
    return view('datatable');
});

Route::post('/get/food', function (Request $request) {
    $columns =  [
                    0 =>'id',
                    1 =>'name',
                ];

    $totalData = \App\Models\Food::where('id', 1)->count();

    $totalFiltered = $totalData;

    $limit = $request->input('length'); // LIMIT REQUEST 10
	$start = $request->input('start'); // START 0
	$order = $columns[$request->input('order.0.column')]; // CASE IS 0 ID
	$dir = $request->input('order.0.dir'); // ASC OR DESC
	$search = $request->input('search.value'); // SEARCH VALUE

	if (empty($search)) {
	    $foods = \App\Models\Food::where('id', 1)
						->offset($start)
	                    ->limit($limit)
	                    ->orderBy($order, $dir)
	                    ->get();
	} else {
	    $foods = \App\Models\Food::where('id', 1)->where(function($query) use ($search, $start, $limit, $order, $dir) {
			$query->orWhereRaw('lower(id) LIKE(?)', "%{$search}%")
				  ->orWhereRaw('lower(name) LIKE(?)', "%{$search}%")
				  ->offset($start)
				  ->limit($limit)
				  ->orderBy($order, $dir);
		})->get();

	    $totalFiltered = \App\Models\Food::where('id', 1)->where(function($query) use ($search) {
			$query->orWhereRaw('lower(id) LIKE(?)', "%{$search}%")
				  ->orWhereRaw('lower(name) LIKE(?)', "%{$search}%");
		})->count();
	}

    $data = array();

    if (!empty($foods)) {
        foreach ($foods as $food) {
            $nestedData['id'] = $food->id;
            $nestedData['name'] = $food->name;
            $data[] = $nestedData;
        }
    }

    $json_data = array(
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data
                );


    return response()->json($json_data);
});

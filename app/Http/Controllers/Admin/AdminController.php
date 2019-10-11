<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function dataTableUser(Request $request)
    {

        $columns =  [
                0 => 'id',
                1 => 'nickname',
                2 => 'fullname',
                3 => 'email',
                4 => 'gender',
                5 => 'address',
                6 => 'postcode',
                7 => 'phone',
                8 => 'birthplace',
                9 => 'birthdate'
            ];

        $user = auth()->user();

        $allUsers = \App\Models\User::count();

        $totalUsers = $allUsers;
        $totalFiltered = $totalUsers;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        if (empty($search)) {
            $users = $user->offset($start)
                        ->limit($limit)
                        ->orderBy($order, $dir)
                        ->get();
        } else {
            $users = $user->where(function($query) use ($search, $start, $limit, $order, $dir) {
                $query->orWhereRaw('lower(id) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(nickname) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(fullname) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(email) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(gender) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(address) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(postcode) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(phone) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(birthplace) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(birthdate) LIKE(?)', "%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir);
                })->get();

            $totalFiltered = $user->where(function($query) use ($search) {
                $query->orWhereRaw('lower(id) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(nickname) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(fullname) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(email) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(gender) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(address) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(postcode) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(phone) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(birthplace) LIKE(?)', "%{$search}%")
                    ->orWhereRaw('lower(birthdate) LIKE(?)', "%{$search}%");
                })->count();
        }

        $data = [];

        if (!empty($users)) {
            foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['nickname'] = $user->nickname;
                $nestedData['fullname'] = $user->fullname;
                $nestedData['email'] = $user->email;
                $nestedData['gender'] = $user->gender;
                $nestedData['address'] = $user->address;
                $nestedData['postcode'] = $user->postcode;
                $nestedData['phone'] = $user->phone;
                $nestedData['birthplace'] = $user->birthplace;
                $nestedData['birthdate'] = $user->birthdate;
                $data[] = $nestedData;
            }
        }

        $json = [
                    "draw" => intval($request->input('draw')),
                    "recordsTotal" => intval($totalUsers),
                    "recordsFiltered" => intval($totalFiltered),
                    "data" => $data
                ];

        return response()->json($json);
    }
}

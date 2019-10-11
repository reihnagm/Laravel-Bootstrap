<?php

namespace App\Http\Controllers\Administrative;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AdministrativeController extends Controller {

    public function regencies(Request $request, $id) {
      $regencies = \App\Models\Regency::where('province_id', $id)->orderBy('name')->get();
      $listRegencies = '';
      foreach ($regencies as $regency) {
          $selected = $regency->id == $request->regency_id ? ' selected' : '';
          $listRegencies .= '<option value="'.$regency->id.'"'.$selected.'>'.$regency->name.'</option>';
      }
      return response()->json($listRegencies);
    }

    public function districts(Request $request, $id) {
      $districts = \App\Models\District::where('regency_id', $id)->orderBy('name')->get();
      $listDistricts = '';
      foreach ($districts as $district) {
          $selected = $district->id == $request->district_id ? ' selected' : '';
          $listDistricts .= '<option value="'.$district->id.'"'.$selected.'>'.$district->name.'</option>';
      }
      return response()->json($listDistricts);
    }

    public function villages(Request $request, $id) {
      $villages = \App\Models\Village::select('villages.id', 'villages.name')->where('district_id', $id)->orderBy('name')->get();
      $listVillages = '';
      foreach ($villages as $village) {
          $selected = $village->id == $request->village_id ? ' selected' : '';
          $listVillages .= '<option value="'.$village->id.'"'.$selected.'>'.$village->name.'</option>';
      }
      return response()->json($listVillages);
    }

}

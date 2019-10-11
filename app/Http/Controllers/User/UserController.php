<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use Image;
use Excel;
use Mail;

use App\Http\Controllers\Controller;

use App\Exports\UsersExport;

use App\Mail\test_email;

use App\Models\Education;
use App\Models\Work;

class UserController extends Controller {

    private $admin_email;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('user/profile');
    }

    public function update(Request $request)  {
        $column = $request->column;
        $value  = $request->value;

        auth()->user()->$column = $value;

        // UPDATE DATA USER
        if (auth()->user()->save()) {
            return response()->json(["message" => "Data berhasil diubah!"]);
        } else {
            return response()->json(["message" => "Data gagal diubah!"]);
        }
    }

    public function update_address(Request $request, $id) {
        $data['address'] = address($id);
        return response()->json($data);
    }

    public function get_education($id) {
        $education = Education::find($id);
        return response()->json($education);
    }

    public function get_work($id) {
        $education = Work::find($id);
        return response()->json($education);
    }

    public function update_education(Request $request, $id) {
        $education = Education::find($id)->update([
            "name" => $request->name,
            "level" => $request->level,
            "majors" => $request->majors,
            "place" => $request->place,
            "year_in" => $request->year_in,
            "year_out" => $request->year_out,
            "current" => $request->status
        ]);

        if ($education) {
            return response()->json([
                'level' => educations($request->level),
                'message' => 'Data riwayat pendidikan berhasil diupdate!'
            ]);
        }   else {
                return response()->json([
                'message' => 'Data riwayat pendidikan gagal diupdate!'
            ]);
        }
    }

    public function update_work(Request $request, $id) {
        $education = Work::find($id)->update([
            "name" => $request->name,
            "position" => $request->position,
            "office" => $request->office,
            "place" => $request->place,
            "year_in" => $request->year_in,
            "year_out" => $request->year_out,
            "status" => $request->status
        ]);

        if ($education) {
            return response()->json([
                'message' => 'Data riwayat pekerjaan berhasil diupdate!'
            ]);
        }   else {
            return response()->json([
                'message' => 'Data riwayat pekerjaan gagal diupdate!'
            ]);
        }
    }

    public function update_photo_profile(Request $request) {
        // OPTIONAL 1
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $destination = base_path().'/public/uploads/images/users/';
            $filename = 'foto_'.auth()->user()->name.'.'.$photo->getClientOriginalExtension();
            if ($photo->isValid()) {
                if (!empty(auth()->user()->photo)) {
                    if (file_exists($destination.auth()->user()->photo)) {
                        unlink($destination.auth()->user()->photo);
                    }
                    if (file_exists($destination.'fit_'.auth()->user()->photo)) {
                        unlink($destination.'fit_'.auth()->user()->photo);
                    }
                }
                $photo->move($destination, $filename);

                // OPEN FILE A IMAGE RESOURCE
                $img = Image::make($destination.$filename);

                // CROP IMAGE
                $img->fit(100)->save($destination.'fit_'.$filename);
                auth()->user()->photo = $filename;
                auth()->user()->update();

                return response()->json([
                    "photo" => $filename
                ]);
            }
        }

      // $validator = \Validator::make($request,[
      //   'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      // ]);
      //
      // if ($validator->passes()) {
      //
      //   $input['photo'] = time().'.'.$request->photo->getClientOriginalExtension();
      //   $request->photo->move(public_path('photo'), $input['photo']);
      //
      //   \App\Models\User::create($input);
      //   return response()->json(['success'=>'Berhasil']);
      // }
      //
      // return response()->json(['error'=> $validator->errors()->all()]);
    }

    public function destroy_photo_profile() {
        auth()->user()->photo = null;
        if (auth()->user()->save()) {
          return response()->json([
                "photo" => auth()->user()->gender == 'm' ? '' : '',
                "message" => 'Foto berhasil dihapus!'
          ]);
        }   else {
            return response()->json([
                "message" => 'Foto gagal dihapus!'
            ]);
        }
    }

    // ADD EDUCATION USE AJAX
    public function add_education(Request $request) {
      // UPDATE USE ELOQUENT
        $education = Education::create([
            "user_id" => auth()->user()->id,
            "name"    => $request->name,
            "level"   => $request->level,
            "majors"  => $request->majors,
            "place"   => $request->place,
            "year_in" => $request->year_in,
            "year_out"=> $request->year_out,
            "current" => $request->status
        ]);
        // VARIABLE DATA KEY IN RESPONSE JSON ENCODE ['message' => 'Data riwayat pendidikan berhasil disimpan!']
        if ($education->save()) {
        // OPTIONAL 1
            return response()->json([
                'id'    => $education->id,
                'level' => educations($education->level),
                'message' => 'Data riwayat pendidikan berhasil disimpan!'
            ]);
          // OPTIONAL 2
          // $data['id'] = $education->id;
          // $data['level'] = educations($education->level);
          // $data['message'] = 'Data riwayat pendidikan berhasil disimpan!';
          // return json_encode($data);
        }  else {
            return response()->json([
                'message' => 'Data riwayat pendidikan gagal disimpan!'
            ]);
        }
    }

    public function add_work(Request $request) {
        $work = Work::create([
            "user_id" => auth()->user()->id,
            "name" => $request->name,
            "position" => $request->position,
            "office" => $request->office,
            "place" => $request->place,
            "year_in" => $request->year_in,
            "year_out" => $request->year_out,
            "current" => $request->status
        ]);

        if ($work->save()) {
            return response()->json([
                'id'    => $work->id,
                'message' => 'Data riwayat pendidikan berhasil disimpan!'
          ]);
        }   else {
            return response()->json([
                'message' => 'Data riwayat pendidikan gagal disimpan!'
          ]);
        }
    }

    public function destroy_work($id) {
        $work = Work::where('id', $id)->where('user_id', auth()->user()->id);
        if ($work) {
          $work->delete();
          // MUST BE RETURN TO JSON_ENCODE IF NOT ALWAYS BE THROW TO FAIL FUNCTION IN AJAX, IT'S FREAK.
          return response()->json(["message" => "Data riwayat pekerjaan berhasil dihapus!"]) ;
        }   else {
          return response()->json(["message" => "Data riwayat pekerjaan gagal dihapus!"]);
        }

        foreach(User::all() as $user) {

        }
    }

    public function destroy_education($id) {
        $education = Education::where('id', $id)->where('user_id', auth()->user()->id);
        if ($education) {
          $education->delete();
          // MUST BE RETURN TO JSON_ENCODE IF NOT ALWAYS BE THROW TO FAIL FUNCTION IN AJAX, IT'S FREAK.
          return response()->json(["message" => "Data riwayat pendidikan berhasil dihapus!"]) ;
        } else {
          return response()->json(["message" => "Data riwayat pendidikan gagal dihapus!"]);
        }
    }

    public function export_excel() {
         return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function send_mail() {
        Mail::to("reihanagam7@gmail.com")->send(new test_email(auth()->user()));

        return "Email telah dikirim...";
    }

}

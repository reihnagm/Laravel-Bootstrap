<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegister extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'nickname' => ['required', 'string', 'max:255'],
          'fullname' => ['required', 'string', 'max:255'],
          'gender' => ['required'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'terms' => ['required']
        ];
    }

    public function messages()
    {
        return[
          'email.unique' => 'Surat Elektronik sudah tersedia.',
          'email.required' => 'Surat Elektronik tidak boleh kosong!',
          'nickname.required' => 'Nama Panggilan tidak boleh kosong!',
          'fullname.required' => 'Nama Lengkap tidak boleh kosong!',
          'gender.required' => 'Jenis Kelamin tidak boleh kosong!',
          'password.required' => 'Kata Sandi tidak boleh kosong!',
          'password.min' => 'Kata Sandi minimal 8 karakter.',
          'password.confirmed' => 'Kata Sandi tidak sama.',
          'terms.required' => 'Mohon centang persyaratan daftar!'
        ];
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">Nama Panggilan </label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" name="nickname" value="{{ old('nickname') }}"autofocus>

                                @if ($errors->has('nickname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nickname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fullname" class="col-md-4 col-form-label text-md-right">Nama Lengkap </label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') }}"autofocus>

                                @if ($errors->has('fullname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fullname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input id="male" type="radio" class="form-check-input" name="gender" value="m">
                                    <label class="form-check-label" for="male">Laki Laki</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input id="female" type="radio" class="form-check-input" name="gender" value="f">
                                    <label class="form-check-label" for="female">Perempuan</label>
                                </div>
                                @foreach ($errors->get('gender') as $error)
                                <strong style="display: block; width: 100%; margin: .25rem 0; font-size: 80%; color: #e3342f;">{{ $error }}</strong>
                                @endforeach
                            </div>


                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Surat Elektronik</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Ulangi Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input id="terms" type="checkbox" class="form-check-input" name="terms">
                                <label for="terms">saya membaca dan setuju dengan <a href="javascript:void(0);">ketentuan pengguna</a>.</label>
                                @foreach ($errors->get('terms') as $error)
                                <strong style="display: block; width: 100%; margin: .25rem 0 .35rem 0; font-size: 80%; color: #e3342f;">{{ $error }}</strong>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                        <span> Sudah punya Akun ? <a href="{{ route('login') }}">Masuk</a> </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

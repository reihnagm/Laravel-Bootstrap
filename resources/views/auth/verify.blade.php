@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Verifikasi Surat Elektronik </div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Verifikasi Surat Elektronik kamu telah terkirim
                    </div>
                    @endif

                    Sebelum diproses lebih lanjut, kami telah mengirimkan tautan pada Surat Elektronik untuk verifikasi, silahkan periksa Surat Elektronik Anda.
                    Jika Anda tidak menerima Surat Elektronik, <a href="{{ route('verification.resend') }}"> klik disini untuk proses ulang verifikasi </a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', '- Profil '.auth()->user()->fullname)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil {{ auth()->user()->fullname }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group list-group-flush" id="profile-datatable">
                        <li class="list-group-item">
                            <h1> DATA PRIBADI </h1>
                            @php
                                switch (auth()->user()->gender) {
                                    case 'm':
                                    $defaultPhoto = '/assets/male.png';
                                    break;
                                    case 'f':
                                    $defaultPhoto = '/assets/female.png';
                                    break;
                                }
                                $photo = !empty(auth()->user()->photo) ? '/uploads/images/users/'.auth()->user()->photo : $defaultPhoto;
                            @endphp
                            <form id="uploadphoto" method="post" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                <img style="width: 200px; cursor: pointer;" src="{{$photo}}" id="photo_profile"  data-toggle="modal" data-target="#photo-edit" alt="{{ auth()->user()->fullname }} Profile Photo">
                                <input type="file" name="photo" id="photo" style="display: none;"/>
                            </form>
                        </li>
                        <li class="list-group-item" data-toggle="modal" data-target="#nickname-edit" id="nickname-data">Nama Panggilan : {{ auth()->user()->nickname }}</li>
                        <li class="list-group-item" data-toggle="modal" data-target="#fullname-edit" id="fullname-data">Nama Lengkap : {{ auth()->user()->fullname }} </li>
                        <li class="list-group-item" data-toggle="modal" data-target="#email-edit" id="email-data">Surat Elektronik : {{ auth()->user()->email }} </li>
                        <li class="list-group-item" data-toggle="modal" data-target="#phone-edit" id="phone-data">No. Telepon : {{ auth()->user()->phone }} </li>
                        <li class="list-group-item" data-toggle="modal" data-target="#date-edit" id="date-data"><span id="textdate">Tempat, Tanggal Lahir :</span> {{ auth()->user()->birthplace.', '.fdate(auth()->user()->birthdate) }}</li>
                          @php
                            $address = !empty(auth()->user()->village_id) ? address(auth()->user()->village_id) : '';
                          @endphp
                        <li class="list-group-item" data-toggle="modal" data-target="#address-edit" id="address-data"> Alamat : {{ auth()->user()->address.' '.$address.' '.auth()->user()->postcode }} </li>
                        <li class="list-group-item" data-toggle="modal" data-target="#about-edit" id="about-data">Tentang Pribadi : {{ auth()->user()->about }} </li>
                    </ul>

                    {{-- MODAL GLOBAL --}}
                    @component('components/modal-global',[
                        'triggerModalArray' =>
                            ['nickname' => 'nickname-edit',
                            'fullname' => 'fullname-edit',
                            'email'    => 'email-edit',
                            'phone'    => 'phone-edit',
                            'date'     => 'date-edit',
                            'address'  => 'address-edit',
                            'about'    => 'about-edit',

                             'photo'    => 'photo-edit',
                             'education-add'  => 'education-add',
                             'education-edit' => 'education-edit',
                             'work-add'       => 'work-add',
                             'work-edit'      => 'work-edit'
                            ]
                    ])
                    @endcomponent

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h1> Riwayat Pendidikan </h1>
                            <ul id="container-education">
                                @foreach (auth()->user()->educations as $school)
                                    @php
                                      $years  = !empty($school['year_out']) ? $school['year_in'].' - '.$school['year_out'] : ($school['current'] == 'yes' ? $school['year_in'].' - Sekarang' : $school['year_in']);
                                      $majors = !empty($school['majors']) ? ' Jurusan '.$school['majors'].',' : '';
                                      $level  = !empty($school['level']) ? ' Tingkat '.educations($school['level']).',' :'';
                                    @endphp

                                    <li data-id="{{ $school['id'] }}">
                                        <b> {{ $years }} - {{ $school['name'] }}, </b>
                                            {{ $level }} {{ $majors }} {{ $school['place'] }}
                                        <a href="javascript:void(0)" onclick="editEducation({{ $school['id'] }})" class="btn btn-info"> Edit Riwayat Pendidikan </a>
                                        <a href="javascript:void(0)" onclick="destroyEducation({{ $school['id'] }})" class="btn btn-danger"> Hapus Riwayat Pendidikan </a>
                                    </li>
                                 @endforeach
                            </ul>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#education-add" class="btn btn-success"> Tambah Riwayat Pendidikan </a>
                        </li>
                    </ul>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h1> Riwayat Pekerjaan </h1>
                             <ul id="container-work">
                                @foreach(auth()->user()->works as $work)
                                    @php
                                        $years    = !empty($work->year_out) ? $work->year_in.' - '.$work->year_out :
                                        ($work->current == 'yes' ? $work->year_in.' - Sekarang' : $work->year_in);
                                        $office   = !empty($work->office) ? $work->office : '';
                                        $name     = !empty($work->name) ? $work->name : '';
                                        $position = !empty($work->position) ? 'Sebagai '.$work->position.'' : '';
                                    @endphp
                                <li data-id="{{$work['id']}}">
                                    <b> {{$years}} - {{$office}}, {{$name}},  </b>
                                    {!! $position !!}, {{ $work['place'] }}
                                    <a href="javascript:void(0);" onclick="editWork({{$work['id']}})" class="btn btn-info"> Edit Riwayat Pendidikan </a>
                                    <a href="javascript:void(0);" onclick="destroyWork({{$work['id']}})" class="btn btn-danger"> Hapus Riwayat Pekerjaan </a>
                                </li>
                                @endforeach
                            </ul>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#work-add" class="btn btn-success"> Tambah Riwayat Pekerjaan </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

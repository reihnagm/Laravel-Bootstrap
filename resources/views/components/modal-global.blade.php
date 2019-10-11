@php
    $keyNickname = "";
    $keyFullname = "";
    $keyEmail    = "";
    $keyPhone    = "";
    $keyDate     = "";
    $keyAddress  = "";
    $keyAbout    = "";

    $keyPhoto    = "";
    $keyEducationAdd = "";
    $keyEducationEdit = "";
    $keyWorkAdd = "";
    $keyWorkEdit = "";


        foreach ($triggerModalArray as $key => $value) {
            switch ($key) {
                case 'nickname':
                    $keyNickname .= $value;
                break;
                case 'fullname':
                    $keyFullname .= $value;
                break;
                case 'email':
                    $keyEmail .= $value;
                break;
                case 'phone':
                    $keyPhone .= $value;
                break;
                case 'date':
                    $keyDate .= $value;
                break;
                case 'address':
                    $keyAddress .= $value;
                break;
                case 'about':
                    $keyAbout .= $value;
                break;

                case 'photo':
                    $keyPhoto .= $value;
                break;
                case 'education-add':
                    $keyEducationAdd .= $value;
                break;
                case 'education-edit':
                    $keyEducationEdit .= $value;
                break;
                case 'work-add':
                    $keyWorkAdd .= $value;
                break;
                case 'work-edit':
                    $keyWorkEdit .= $value;
                break;
            default:
            }
        }
@endphp

@php if($keyNickname): @endphp
<div class="modal fade" id="{{ $keyNickname }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nama Panggilan</h4>
            </div>
            <div class="modal-body">

                <label class="form-label">Ubah Nama Panggilan</label>

                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="nickname" name="nickname" class="form-control" value="{{ auth()->user()->nickname }}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="changeNickname();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

@php if($keyFullname): @endphp
<div class="modal fade" id="{{ $keyFullname }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nama Lengkap</h4>
            </div>
            <div class="modal-body">

                <label class="form-label">Ubah Nama Lengkap</label>

                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="fullname" name="fullname" class="form-control" value="{{ auth()->user()->fullname }}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="changeFullname();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

@php if($keyEmail): @endphp
<div class="modal fade" id="{{ $keyEmail }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nama Surat Elektronik</h4>
            </div>
            <div class="modal-body">

                <label class="form-label">Ubah Surat Elektronik</label>

                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="changeEmail();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

@php if($keyPhone): @endphp
<div class="modal fade" id="{{ $keyPhone }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Telepon</h4>
            </div>
            <div class="modal-body">

                <label class="form-label">Ubah Telepon</label>

                <div class="form-group">
                    <div class="form-line">
                        <input type="text" onKeyPress="return isNumberKey(event);" id="phone" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="changePhone();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

@php if($keyAbout): @endphp
<div class="modal fade" id="{{ $keyAbout }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tentang Pribadi</h4>
            </div>
            <div class="modal-body">

                <label class="form-label">Ubah Tentang Pribadi</label>

                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="about" name="about" class="form-control" value="{{ auth()->user()->about }}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="changeAbout();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

@php if($keyDate): @endphp
<div class="modal fade" id="{{ $keyDate }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tempat, Tanggal Lahir</h4>
            </div>
            <div class="modal-body">
                <label class="form-label">Ubah Tempat, Tanggal Lahir<span class="col-red">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="birthplace" name="birthplace" class="form-control" value="{{ auth()->user()->birthplace }}">
                    </div>
                </div>
                <label class="form-label">Tanggal Lahir<span class="col-red">*</span></label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="birthdate" class="datepicker form-control" placeholder="Tolong masukan tanggal Anda..." value="{{ fdate(auth()->user()->birthdate) }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="changeDate();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

@php if($keyAddress): @endphp
<div class="modal fade" id="{{ $keyAddress }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Perbaharui Alamat</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 m-b-15">
                        <label class="form-label"> Provinsi </label>

                        {{-- IF USE LARAVEL COLLECTIVE --}}
                        {{-- {{ Form::select('province_id', [null=>'Pilih Provinsi']+provinces(),  : null, ['class'=>'form-control show-tick', 'id'=>'provinces', 'onChange'=>'getRegencies(this.value);']) }} --}}

                        {{-- IF NOT USE LARAVEL COLLECTIVE --}}
                        <select id="provinces" class="form-control show-tick" name="province_id" onchange="getRegencies(this.value)">
                                <option value selected="selected"> Pilih Provinsi </option>
                            @foreach (provinces() as $key => $val)
                                <option value="{{ $key }}"> {{ $val }} </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 m-b-15">
                        <label class="form-label"> Kota / Kabupaten </label>

                        {{-- IF USE LARAVEL COLLECTIVE --}}
                        {{-- {{ Form::select('regency_id', !empty(auth()->user()->village_id) ? regencies(auth()->user()->village->district->regency->province->id) : [null=>'Pilih Kota/Kabupaten'], !empty(auth()->user()->village_id) ? auth()->user()->village->district->regency->id : null, ['class'=>'form-control show-tick', 'id'=>'regencies', 'onChange'=>'getDistricts(this.value);']) }}
                        --}}

                        {{-- IF NOT USE LARAVEL COLLECTIVE --}}
                        <select id="regencies" class="form-control show-tick" name="regency_id" onchange="getDistricts(this.value)">
                                <option value selected="selected"> Pilih Kota/Kabupaten </option>
                            @foreach (regencies(auth()->user()->village['district']['regency']['province']['id']) as $key => $value)
                                <option value="{{ $key }}"> {{ $value }} </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 m-b-15">
                        <label class="form-label"> Kecamatan </label>

                        {{-- IF USE LARAVEL COLLECTIVE --}}
                        {{-- {{ Form::select('district_id', !empty(auth()->user()->village_id) ? districts(auth()->user()->village->district->regency->id) : [null=>'Pilih Kecamatan'], !empty(auth()->user()->village_id) ? auth()->user()->village->district->id : null, ['class'=>'form-control show-tick', 'id'=>'districts', 'onChange'=>'getVillages(this.value);']) }}
                        --}}

                        {{-- IF NOT USE LARAVEL COLLECTIVE --}}
                        <select id="districts" class="form-control show-tick" name="district_id" onchange="getVillages(this.value)">
                                <option value selected="selected"> Pilih Kecamatan </option>
                            @foreach ( districts(auth()->user()->village['district']['regency']['id']) as $key => $value)
                                <option value="{{ $key }}"> {{ $value }} </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 m-b-15">
                        <label class="form-label"></label>

                        {{-- IF USE LARAVEL COLLECTIVE --}}
                        {{-- {{ Form::select('village_id', !empty(auth()->user()->village_id) ? villages(auth()->user()->village->district->id) : [null=>'Pilih Kelurahan/Desa'], !empty(auth()->user()->village_id) ? auth()->user()->village->id : null, ['class'=>'form-control show-tick', 'id'=>'villages']) }}
                        --}}

                        {{-- IF NOT USE LARAVEL COLLECTIVE --}}
                        <select id="villages" class="form-control show-tick" name="village_id">
                                <option value selected="selected"> Pilih Kelurahan/Desa </option>
                            @foreach ( villages(auth()->user()->village['district']['id']) as $key => $value)
                                <option value="{{ $key }}"> {{ $value }} </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-9 col-sm-12">
                        <label class="form-label">Alamat<span class="col-red">*</span></label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="1" class="form-control no-resize auto-growth" placeholder="Alamat" id="address">{!! auth()->user()->address !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label class="form-label">Kode Pos<span class="col-red">*</span></label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="postcode" name="postcode" class="form-control" value="{{ auth()->user()->postcode }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="changeAddress();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

@php if($keyPhoto): @endphp
<div class="modal fade" id="{{ $keyPhoto }}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title align-center">Ubah Foto Profil</h4>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-info" onclick="$('#photo').trigger('click'); $('#photo-update').modal('hide');">Ganti Foto</button>
                <button type="button" class="btn btn-danger" id="removePhoto">Hapus Foto</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp


@php if($keyEducationAdd): @endphp
<div class="modal fade" id="{{ $keyEducationAdd }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Riwayat Pendidikan </h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <form id="education-form">
                        <div class="col-sm-12">
                            <label for="education-name">Nama Instansi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="hidden" id="education-id" class="form-control">
                                    <input type="text" id="education-name" class="form-control">
                                </div>
                            </div>
                            <label for="education-level">Tingkat <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">

                                    {{-- IF USE LARAVEL COLLECTIVE --}}
                                    {{-- {{ Form::select('education', [null=>'--Pilih Tingkat--']+educations(), null, ['class'=>'form-control show-tick', 'id'=>'education']) }} --}}

                                    <select id="education-level" name="education-level" class="form-control show-tick">
                                        <option value selected="selected"> -- Pilih Tingkat -- </option>
                                        @foreach (educations() as $key => $value)
                                        <option value="{{ $key }}"> {{ $value }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <label for="education-majors">Jurusan</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="education-majors" class="form-control">
                                </div>
                            </div>
                            <label for="education-place">Lokasi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="education-place" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-year_in">Tahun Masuk <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="education-year-in" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-year_out">Tahun Keluar</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="education-year-out" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="education-status">Status <span class="col-red">*</span></label>
                            <div class="form-group m-b-0">
                                <div class="form-line success">

                                    {{-- IF USE LARAVEL COLLECTIVE --}}

                                    {{-- {{ Form::select('education-status', [null=>'--Status Sekarang--', 'yes'=>'Masih Belajar', 'no'=>'Sudah Lulus'], null, ['class'=>'form-control show-tick', 'id'=>'education-status']) }} --}}

                                    <select id="education-status" class="form-controler show-tick" name="education-status">
                                        <option value selected="selected">-- Status Sekarang --</option>
                                        <option value="yes"> Masih Belajar </option>
                                        <option value="no"> Sudah Lulus </option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="saveEducation();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp


@php if($keyEducationEdit): @endphp
<div class="modal fade" id="{{ $keyEducationEdit }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Edit Riwayat Pendidikan </h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <form id="education-form">
                        <div class="col-sm-12">
                            <label for="education-name"> Nama Instansi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="hidden" id="education-id-edit" class="form-control">
                                    <input type="text" id="education-name-edit" class="form-control">
                                </div>
                            </div>
                            <label for="education-level">Tingkat <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">

                                    {{-- IF USE LARAVEL COLLECTIVE --}}
                                    {{-- {{ Form::select('education', [null=>'--Pilih Tingkat--']+educations(), null, ['class'=>'form-control show-tick', 'id'=>'education']) }} --}}

                                    {{-- IF NOT USE LARAVEL COLLECTIVE --}}
                                    <select id="education-level-edit" name="education-level" class="form-control show-tick">
                                        <option value selected="selected"> -- Pilih Tingkat -- </option>
                                        @foreach (educations() as $key => $value)
                                        <option value="{{ $key }}"> {{ $value }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <label for="education-majors">Jurusan</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="education-majors-edit" class="form-control">
                                </div>
                            </div>
                            <label for="education-place">Lokasi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="education-place-edit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-year_in">Tahun Masuk <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="education-year-in-edit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="education-year_out">Tahun Keluar</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="education-year-out-edit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="education-status">Status <span class="col-red">*</span></label>
                            <div class="form-group m-b-0">
                                <div class="form-line success">

                                    {{-- IF USE LARAVEL COLLECTIVE --}}

                                    {{-- {{ Form::select('education-status', [null=>'--Status Sekarang--', 'yes'=>'Masih Belajar', 'no'=>'Sudah Lulus'], null, ['class'=>'form-control show-tick', 'id'=>'education-status']) }} --}}

                                    <select id="education-status-edit" class="form-controler show-tick" name="education-status">
                                        <option value selected="selected">-- Status Sekarang --</option>
                                        <option value="yes"> Masih Belajar </option>
                                        <option value="no"> Sudah Lulus </option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="updateEducation();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp



@php if($keyWorkAdd): @endphp
<div class="modal fade" id="{{ $keyWorkAdd }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Riwayat Pekerjaan </h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <form id="education-form">
                        <div class="col-sm-12">
                            <label for="education-name">Nama Pekerjaan/Profesi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="hidden" id="work-id" class="form-control">
                                    <input type="text" id="work-name" class="form-control">
                                </div>
                            </div>
                            <label for="education-level">Nama Kantor/Dinas <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="work-office" class="form-control">
                                </div>
                            </div>
                            <label for="work-position">Jabatan/Posisi</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="work-position" class="form-control">
                                </div>
                            </div>

                            <label for="work-place">Lokasi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="work-place" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="work-year_in">Tahun Mulai <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="work-year-in" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="work-year_out">Tahun Berhenti</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="work-year-out" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="education-status">Status <span class="col-red">*</span></label>
                            <div class="form-group m-b-0">
                                <div class="form-line success">

                                    {{-- IF USE LARAVEL COLLECTIVE --}}

                                    {{-- {{ Form::select('education-status', [null=>'--Status Sekarang--', 'yes'=>'Masih Belajar', 'no'=>'Sudah Lulus'], null, ['class'=>'form-control show-tick', 'id'=>'education-status']) }} --}}

                                    <select id="work-status" class="form-controler show-tick" name="education-status">
                                        <option value selected="selected">-- Status Sekarang --</option>
                                        <option value="yes"> Masih Bekerja </option>
                                        <option value="no"> Sudah Berhenti </option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="saveWork();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp


@php if($keyWorkEdit): @endphp
<div class="modal fade" id="{{ $keyWorkEdit }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Riwayat Pekerjaan </h4>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <form id="education-form">
                        <div class="col-sm-12">
                            <label for="education-name">Nama Pekerjaan/Profesi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="hidden" id="work-id-edit" class="form-control">
                                    <input type="text" id="work-name-edit" class="form-control">
                                </div>
                            </div>
                            <label for="education-level">Nama Kantor/Dinas <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="work-office-edit" class="form-control">
                                </div>
                            </div>
                            <label for="work-position">Jabatan/Posisi</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="work-position-edit" class="form-control">
                                </div>
                            </div>

                            <label for="work-place">Lokasi <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="text" id="work-place-edit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="work-year_in">Tahun Mulai <span class="col-red">*</span></label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="work-year-in-edit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="work-year_out">Tahun Berhenti</label>
                            <div class="form-group">
                                <div class="form-line success">
                                    <input type="number" id="work-year-out-edit" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="education-status">Status <span class="col-red">*</span></label>
                            <div class="form-group m-b-0">
                                <div class="form-line success">

                                    {{-- IF USE LARAVEL COLLECTIVE --}}

                                    {{-- {{ Form::select('education-status', [null=>'--Status Sekarang--', 'yes'=>'Masih Belajar', 'no'=>'Sudah Lulus'], null, ['class'=>'form-control show-tick', 'id'=>'education-status']) }} --}}

                                    <select id="work-status-edit" class="form-controler show-tick" name="education-status">
                                        <option value selected="selected">-- Status Sekarang --</option>
                                        <option value="yes"> Masih Bekerja </option>
                                        <option value="no"> Sudah Berhenti </option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" onclick="updateWork();">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@php endif; @endphp

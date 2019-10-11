// UPDATE DATA OTHER USER
function updateData(column, newValue) {
    $.ajax({
        type: 'PUT',
        data: {
            column: column,
            value: newValue
        },
        url: '/user/update',
        success: function(data) {
            console.log(data)
        },
        error: function(data) {
            console.log(data)
        }
    });
}

//  CHANGE NICKNAME
function changeNickname() {
    var nickname = $('#nickname').val();
    swal({
        title: "Apakah yakin ingin mengubah data?",
        text: "Ubah Nama Panggilan?",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        showCancelButton: true,
        closeOnConfirm: false
    }, function() {
        window.onkeydown = null;
        window.onfocus = null;
        updateData('nickname', nickname);
        swal("Berhasil!", "Data Nama Panggilan berhasil diganti.", "success");
        $('#nickname-data').html('Nama Panggilan : ' + nickname);
        $('#nickname-edit').modal('hide');
    });
}

// CHANGE FULLNAME
function changeFullname() {
    var fullname = $('#fullname').val();
    swal({
        title: "Apakah yakin ingin mengubah data?",
        text: "Ubah Nama Lengkap?",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        showCancelButton: true,
        closeOnConfirm: false
    }, function() {
        window.onkeydown = null;
        window.onfocus = null;
        updateData('fullname', fullname);
        swal("Berhasil!", "Data Nama Panggilan berhasil diganti.", "success");
        $('#fullname-data').html('Nama Lengkap : ' + fullname);
        $('#fullname-edit').modal('hide');
    });
}

// CHANGE EMAIL
function changeEmail() {
    var email = $('#email').val();
    swal({
        title: "Apakah yakin ingin mengubah data?",
        text: "Ubah Surat Elektronik?",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        showCancelButton: true,
        closeOnConfirm: false
    }, function() {
        window.onkeydown = null;
        window.onfocus = null;
        passEmail(email)
    });
}

// CHANGE PHONE
function changePhone() {
    var phone = $('#phone').val();
    swal({
        title: "Apakah yakin ingin mengubah data?",
        text: "Ubah Telepon?",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        showCancelButton: true,
        closeOnConfirm: false
    }, function() {
        window.onkeydown = null;
        window.onfocus = null;
        passPhone(phone)
    });
}

// CHANGE ABOUT
function changeAbout() {
    var about = $('#about').val();
    swal({
        title: "Apakah yakin ingin mengubah data?",
        text: "Ubah Tentang Pribadi?",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        showCancelButton: true,
        closeOnConfirm: false
    }, function() {
        window.onkeydown = null;
        window.onfocus = null;
        updateData('about', about);
        swal("Berhasil!", "Data Tentang Pribadi berhasil diganti.", "success");
        $('#about-data').html('Tentang Pribadi : ' + about);
        $('#about-edit').modal('hide');
    });
}

// CHANGE DATE
function changeDate() {
    var birthplace = $('#birthplace').val();
    var birthdate = moment($('#birthdate').val(), 'dddd DD MMMM YYYY').format('YYYY-MM-DD');
    var birth_val = birthplace + ", " + $('#birthdate').val();
    swal({
        title: "Apakah yakin ingin mengubah data?",
        text: "Data Tempat, Tanggal Lahir?",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        showCancelButton: true,
        closeOnConfirm: false
    }, function() {
        window.onkeydown = null;
        window.onfocus = null;
        updateData('birthplace', birthplace);
        updateData('birthdate', birthdate);
        swal("Berhasil!", "Data Tempat, Tanggal Lahir berhasil diganti.", 'success');
        $('#date-data').html('Tempat, Tanggal Lahir : ' + birth_val);
        $('#date-edit').modal('hide');
    });
}

// CHANGE ADDRESS
function changeAddress() {
    var paramId = $('#villages').val();

    var address = $('#address').val();
    var postcode = $('#postcode').val();
    swal({
        title: "Apakah yakin ingin mengubah data?",
        text: "Ubah Alamat?",
        type: "warning",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        showCancelButton: true,
        closeOnConfirm: false
    }, function() {
        window.onkeydown = null;
        window.onfocus = null;
        if (paramId && address && postcode) {
            if (postcode.length == 5) {
                updateData('village_id', paramId);
                updateData('address', address);
                updateData('postcode', postcode);
                $.ajax({
                    type: 'PUT',
                    data: {
                        village_id: paramId
                    },
                    url: '/user/address/update/' + paramId,
                    success: function(data) {
                        swal("Berhasil!", "Data Alamat berhasil diganti.", "success");
                        $('#address-data').html('Alamat : ' + address + ' ' + data.address + ' ' + postcode);
                        $('#address-edit').modal('hide');
                    }
                });
            } else {
                swal("Maaf!", "Data Kode Pos harus 5 digit!", "error");
            }
        } else {
            swal("Maaf!", "Data tidak boleh kosong!", "error");
        }
    });
}

function getRegencies(province_id) {
    $.ajax({
        url: "/information/get/regencies/" + province_id,
        type: "GET"
    }).done(function(data) {
        $('#regencies').html(data);
        regency_id = $('#regencies').val();
        getDistricts(regency_id);
    }).fail(function(data) {
        console.log('gagal di regencies ' + data);
    });
}

function getDistricts(regency_id) {
    $.ajax({
        url: "/information/get/districts/" + regency_id,
        type: "GET"
    }).done(function(data) {
        $('#districts').html(data);
        district_id = $('#districts').val();
        getVillages(district_id);
    }).fail(function(data) {
        console.log(data)
        console.log('gagal di districts');
    });
}

function getVillages(district_id) {
    $.ajax({
        url: "/information/get/villages/" + district_id,
        type: "GET"
    }).done(function(data) {
        $('#villages').html(data);
    }).fail(function(data) {
        console.log('gagal di villages' + data);
    });
}

function saveEducation() {

    var name = $('#education-name').val();
    var level = $('#education-level').val();
    var majors = $('#education-majors').val();
    var place = $('#education-place').val();
    var year_in = +$('#education-year-in').val();
    var year_out = +$('#education-year-out').val();
    var status = $('#education-status').val();

    if (name == '' || level == '' || place == '' || year_in == '' || status == '') {
        swal('Error', 'Kolom bertanda (*) harus diisi!', 'error');
    } else {
        if (year_in < 1945 || year_in > (new Date()).getFullYear()) {
            swal('Error', 'Data Tahun Masuk harus rentang dari tahun 1945 dan tahun ' + (new Date()).getFullYear(), 'error');
            return false;
        }
        if (year_out && (year_out < 1945 || year_out > (new Date()).getFullYear())) {
            swal('Error', 'Data Tahun Keluar rentang dari tahun 1945 dan tahun ' + (new Date()).getFullYear(), 'error');
            return false;
        }
        if (year_out && year_out < year_in) {
            swal('Error', 'Data Tahun Masuk tidak boleh lebih dari Tahun Keluar', 'error');
            return false;
        }
        if (status == 'yes' && year_out) {
            swal('Error', 'Tidak bisa memilih, Masih Belajar jika Tahun Keluar diisi!', 'error');
            $('#education-year_out').val('');
            return false;
        }
        $.ajax({
            type: "POST",
            data: {
                name: name,
                level: level,
                majors: majors,
                place: place,
                year_in: year_in,
                year_out: year_out,
                status: status
            },
            url: "/user/education/add",
            success: function(data) {

                var years = year_in;

                if (year_out) {
                    var years = '<b>' + year_in + ' - ' + year_out + '</b>';
                }
                if (status == 'yes') {
                    var years = '<b>' + year_in + ' - Sekarang' + '</b>';
                }

                var level = ' Tingkat '+ data.level+', ';

                var vname = '<b>'+ name +','+'</b>';

                var vmajors = '';
                if (majors) {
                    vmajors = ' Jurusan '+majors+', ';
                }

                swal('Berhasil', 'Data berhasil disimpan!', 'success');

                // WHY USE SPLIT ? BECAUSE WEIRD COMMA, LIKE THIS 'VALUE , VALUE' EXPECT 'VALUE, VALUE'
                var li = '<li data-id="'+data.id+'">'+ years +' - '+ vname + level + vmajors + place +
                            '<a href="javascript:void(0)" onclick="editEducation('+data.id+')" class="btn btn-info"> Edit Riwayat Pendidikan </a>'  +
                            '<a href="javascript:void(0)" onclick="destroyEducation('+data.id+')" class="btn btn-danger"> Hapus Riwayat Pendidikan </a>'
                        + '</li>';

                $('#education-add').modal('hide');
                // APPEND NEW LINE FOR ADD THE DATA
                $('#container-education').append(li);
            },
            error: function(data) {
                console.log(data)
            }
        });
    }
}

function editEducation(paramId) {
    $.ajax({
        type: "GET",
        url: "/user/education/edit/" + paramId,
        success: function(data, name) {
            $('#education-id-edit').val(paramId);
            $('#education-name-edit').val(data.name);
            $('#education-place-edit').val(data.place);
            $('#education-level-edit').val(data.level);
         // $('#education-level-edit').selectpicker('refresh'); FIX : FREEZE
            $('#education-majors-edit').val(data.majors);
            $('#education-year-in-edit').val(data.year_in);
            $('#education-year-out-edit').val(data.year_out);
            $('#education-status-edit').val(data.current);
         // $('#education-status-edit').selectpicker('refresh'); FIX : FREEZE
            $('#education-edit').modal('show');
        },
        error: function(data) {
            console.log(data)
        }
    })
}

function updateEducation() {

    var paramId = $('#education-id-edit').val();

    var name = $('#education-name-edit').val();
    var level = $('#education-level-edit').val();
    var majors = $('#education-majors-edit').val();
    var place = $('#education-place-edit').val();
    var year_in = $('#education-year-in-edit').val();
    var year_out = +$('#education-year-out-edit').val();
    var status = $('#education-status-edit').val();

    $.ajax({
        type: "PUT",
        data: {
            name: name,
            level: level,
            majors: majors,
            place: place,
            year_in: year_in,
            year_out: year_out,
            status: status
        },
        url: "/user/education/update/" + paramId,
        success: function(data) {

            var years = year_in;

             if (year_out) {
               var years = '<b>'+ year_in +' - '+ year_out +' - '+'</b>';
            } else {
               var years = '<b>'+ year_in +' - '+ '</b>';
            }
             if (status == 'yes') {
                var years = '<b>'+ year_in +' - Sekarang' + '</b>';
            }

            var level = ' Tingkat '+ data.level +', ';

            var vname = '<b>'+ name +','+'</b>';

            var vmajors = '';
            if (majors) {
                vmajors = ' Jurusan '+majors+', ';
            }

            swal('Berhasil', 'Data riwayat pendidikan berhasil diubah!', 'success');

            var li ='<li data-id="'+paramId+'">'+ years + vname + level + vmajors + place +
                        '<a href="javascript:void(0)" onclick="editEducation('+paramId+')" class="btn btn-info"> Edit Riwayat Pendidikan </a>'  +
                        '<a href="javascript:void(0)" onclick="destroyEducation('+paramId+')" class="btn btn-danger"> Hapus Riwayat Pendidikan </a>'
                    + '</li>';

            // DOT .HTML FOR UPDATE THE DATA
            $('#container-education').find('[data-id="empty"]').remove();
            $('#container-education').find('[data-id="'+paramId+'"]').html(li);
            $('#education-modal-edit').modal('hide');

        },
        error: function(data) {
            console.log(data)
        }
     });
}

function destroyEducation(paramId) {
    swal({
        title: "Apakah kamu yakin menghapus riwayat pendidikan?",
        text: "Hapus riwayat pendidikan?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: 'DELETE',
            url: '/user/education/destroy/' + paramId,
            // WEIRD BUG, SUCCESS BUT THROW ERROR FUNCTION IF IN CONTROLLER NOT RETURN JSON_ENCODE
            success:function(data) {
                swal("Berhasil!", "Data riwayat pendidikan berhasil dihapus!", "success");
                 $('#container-education').find('[data-id="'+paramId+'"]').remove();
            },
            error: function(data) {
                console.log(data)
                swal("Maaf!", "Data riwayat pendidikan gagal dihapus!", "error");
            }
        });
    });
}

function saveWork() {
    var id = $('#work-id').val();
    var name = $('#work-name').val();
    var position = $('#work-position').val();
    var office = $('#work-office').val();
    var place = $('#work-place').val();
    var year_in = +$('#work-year-in').val();
    var year_out = +$('#work-year-out').val();
    var status = $('#work-status').val();

    if (name == '' || place == '' || year_in == '' || status == '') {
        swal('Error', 'Kolom bertanda (*) harus diisi!!', 'error');
    } else {
        var currentYear = (new Date()).getFullYear();
        if (year_in < 1945 || year_in > currentYear) {
            swal('Error', 'Data Tahun Masuk harus rentang dari tahun 1945 dan tahun '+currentYear, 'error');
            return false;
        }
        if (year_out && (year_out < 1945 || year_out > currentYear)) {
            swal('Error', 'Data Tahun Keluar rentang dari tahun 1945 dan tahun '+ currentYear, 'error');
            return false;
        }
        if (year_out && year_out < year_in) {
            swal('Error', 'Data Tahun Masuk tidak boleh lebih dari Tahun Keluar', 'error');
            return false;
        }
        if (status == 'yes' && year_out) {
            swal('Error', 'Tidak bisa set Masih Belajar jika Tahun Keluar diisi!', 'error');
            $('#work-year-out').val('');
            return false;
        }
        vwork = '';
        vposition = '';
        $.ajax({
            type: "POST",
            data: {
                name: name,
                position: position,
                office: office,
                place: place,
                year_in: year_in,
                year_out: year_out,
                status: status
            },
            url: "/user/work/add",
            success: function(data) {
                var years = year_in;
                if (year_out) {
                    var years = year_in+' - '+year_out;
                }
                if (status == 'yes') {
                    var years = year_in+' - Sekarang';
                }
                var vwork = name;
                if (office) {
                    vwork = office;
                }
                if (position) {
                    vposition = 'Sebagai '+position+'';
                }

                swal('Berhasil', 'Data berhasil disimpan!', 'success')

                var li = '<li data-id="'+data.id+'">'+ years +' - '+ vwork + vposition + place +
                            '<a href="javascript:void(0)" onclick="editWork('+data.id+')" class="btn btn-info"> Edit Riwayat Pekerjaan </a>'  +
                            '<a href="javascript:void(0)" onclick="destroyWork('+data.id+')" class="btn btn-danger"> Hapus Riwayat Pekerjaan </a>'
                        +'</li>';

                $('#work-add').modal('hide');
                $('#container-work').append(li);
            },
            error: function(data) {
                console.log(data, 'Error');
            }
        });
    }
}


function editWork(paramId) {
    $.ajax({
        type: "GET",
        url: "/user/work/edit/" + paramId,
        success: function(data) {
            $('#work-id-edit').val(paramId);
            $('#work-name-edit').val(data.name);
            $('#work-position-edit').val(data.place);
            $('#work-office-edit').val(data.office);
            $('#work-place-edit').val(data.place);
            $('#work-year-in-edit').val(data.year_in);
            $('#work-year-out-edit').val(data.year_out);
            $('#work-status-edit').val(data.current);
            $('#work-edit').modal('show');
        },
        error: function(data) {
            console.log(data)
        }
    })
}

function updateWork() {

    var paramId = $('#work-id-edit').val();

    var name = $('#work-name-edit').val();
    var position = $('#work-position-edit').val();
    var office = $('#work-office-edit').val();
    var place = $('#work-place-edit').val();
    var year_in = $('#work-year-in-edit').val();
    var year_out = +$('#work-year-out-edit').val();
    var status = $('#work-status-edit').val();

    $.ajax({
        type: "PUT",
        data: {
            name: name,
            position: position,
            office: office,
            place: place,
            year_in: yearIn,
            year_out: yearOut,
            status: status
        },
        url: "/user/work/update/" + paramId,
        success: function(data) {
            var years = yearIn;
            if (yearOut) {
                var years = yearIn + ' - ' + yearOut;
            }
            if (status == 'yes') {
                var years = yearIn + ' - Sekarang';
            }
            var vmajors = '';
            if (majors) {
                vmajors = ' Jurusan ' + majors;
            }

            swal('Berhasil', 'Data riwayat pendidikan berhasil diubah!', 'success');

             var li = '<li data-id="'+data.id+'">'+ years +' - '+ name + ', Jurusan '+ majors.split(' ').join(', ') +' '+ place +
                        '<a href="javascript:void(0)" onclick="editWork('+data.id+')" class="btn btn-info"> Edit Riwayat Pendidikan </a>'  +
                        '<a href="javascript:void(0)" onclick="destroyWork('+data.id+')" class="btn btn-danger"> Hapus Riwayat Pendidikan </a>'
                    + '</li>';

            $('#container-work').find('[data-id="'+paramId+'"]').html(li);
            $('#work-edit').modal('hide');
        },
        error: function(data) {
            console.log(data)
        }
     });
}


function destroyWork(paramId) {
    swal({
        title: "Apakah kamu yakin menghapus riwayat pekerjaan?",
        text: "Hapus riwayat pekerjaan?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: 'DELETE',
            url: 'user/work/destroy/' + paramId,
            // WEIRD BUG, SUCCESS BUT THROW ERROR FUNCTION IF IN CONTROLLER NOT RETURN JSON_ENCODE
            success:function(data) {
                swal("Berhasil!", "Data riwayat pekerjaan berhasil dihapus!", "success");
                 $('#container-work').find('[data-id="'+paramId+'"]').remove();
            },
            error: function(data) {
                swal("Maaf!", "Data riwayat pekerjaan gagal dihapus!", "error");
            }
        });
    });

}

// VALIDATE AND SEND DATA

function passEmail(email) {
    var regex = new RegExp(/^[a-zA-Z0-9_]+@[a-zA-Z0-9]+\.(com|net|org])$/)
    if (regex.test(email)) {
        updateData('email', email);
        swal("Berhasil!", "Data surat elektronik berhasil diganti.", 'success');
        $('#email-data').html('Surat Elektronik : ' + email);
        $('#email-edit').modal('hide');
        return true;
    } else {
        swal('Error', 'Format data tidak sesuai!\ncontoh: reihanagam7@gmail.com', 'error');
        return false;
    }
}

function passPhone(phone) {
    numbers = /^[0-9]+$/;
    if (phone.match(numbers)) {
        updateData('phone', phone);
        swal('Berhasil!', 'Data Telepon berhasil diganti.', 'success');
        $('#phone-data').html('No. Telepon : ' + phone);
        $('#phone-edit').modal('hide');
    } else {
        swal('Error', 'Format data tidak sesuai!\ncontoh: 089670558381', 'error')
        return false;
    }
}


// COMBO BOX CHAINED

// VARIABLE IN FUNCTION OR ANYNOMOUS FUNCTION
// var getRegencies = function(province_id) {
//   $.get('/information/create/regencies/' + province_id, function(data) {
//         $('#regencies').html(data);
//         regency_id = $('#regencies').val();
//         getDistricts(regency_id);
//     });
// }


// PHOTO
$('#photo').on('change', function() {
    var filename  = $('#photo').val();
    var uniqueImg = new Date().getTime()
    // CHECK EXTENSION ".PNG"
    var parts = filename.split('.');
    var ext = parts[parts.length - 1];
    if (!isImage(ext)) {
        swal('error', 'File bukan gambar!', 'error');
    } else {
        var photo = $('#photo')[0].files[0];
        var form = new FormData();
        form.append('photo', photo);
        $.ajax({
            url: '/user/upload/photo/profile',
            data: form,
            type: 'POST',
            contentType: false, // FIX : ILLEGAL INVOCATION IMG
            processData: false, // FIX : ILLEGAL INVOCATION IMG
            cache: false, // FIX : ILLEGAL INVOCATION IMG
            success: function(data) {
                swal("Berhasil", "Foto Profil berhasil diubah!", "success")
                $('#photo_profile').attr('src',"/uploads/images/users/"+data.photo+"?"+uniqueImg);
            },
            error: function(data) {
                swal("Gagal", "Foto Profil berhasil diubah!", "error")
            }
        });
    }
});

$('#removePhoto').click(function(e) {
    swal({
        title: "Yakin?",
        text: "Apakah kamu ingin menghapus foto ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            url: '/user/destroy/photo/profile',
            type: 'DELETE',
            success: function(data) {
                swal("Berhasil!", "Foto Profil berhasil dihapus!", "success")
            },
            error: function(data) {
                swal("Gagal!", "Foto Profil gagal dihapus!", "error");
            }
        });
    });
    $('#photo-update').modal('hide');
});


// CHECK IMAGE EXTENSION
function isImage(ext) {
    switch (ext.toLowerCase()) {
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
        return true;
    }
    return false;
}

// FORCE INPUT ONLY NUMBER FOR : PHONE NUMBER, ZIP CODE OR ETC
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;

    return true;
}

$(function() {

    // DATE PICKER
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY',
        clearButton: true,
        weekStart: 1,
        time: false,
        lang: 'id-ID'
    });

    // AUTO SIZE
    autosize($('textarea.auto-growth'));

});

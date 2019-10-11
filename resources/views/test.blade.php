<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <h3>VANILLA JAVASCRIPT</h3>
        @for ($i = 1; $i <= 4 ; $i++)
            <input placeholder="data pertama" id="data-pertama{{$i}}" type="number">
            <input placeholder="data kedua" id="data-kedua{{$i}}" type="number">
            <span id="validate{{$i}}" style="color: red;"> </span> <br>
        @endfor

        <input id="submit" type="submit">



        <br> <br>

    <form id="form-jquery" action="" method="post">

        <select id="tahunpajak">
            <option value selected>-- Pilih Tahun Pajak --</option>
            <option value="1">2019</option>
            <option value="2">2018</option>
            <option value="3">2017</option>
            <option value="4">2016</option>
            <option value="5">2015</option>
        </select> <br>

        <select id="masapajak">
            <option value selected>-- Pilih Masa Pajak --</option>
            <option value="1">January</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
        </select> <br>

        <span id="validate-select-jquery" style="color: red;"> </span> <br>

        <h3>JQUERY</h3>
        @for ($i = 1; $i <= 4; $i++)
            <input placeholder="Volume{{$i}}" id="volume{{$i}}" type="text" onKeyPress="return isNumberKey(event);">
            <input placeholder="Dpp" id="dpp{{$i}}" type="text" onKeyPress="return isNumberKey(event);">
            <span id="validate-jquery{{$i}}" style="color: red;"> </span>  <br>
        @endfor

        <input type="checkbox" name="agree" class="filled-in" id="agree">

        <span id="validate-checkbox-jquery" style="color: red;"> </span> <br>

        <input id="submit-jquery" type="submit">

    </form>

    {{-- <input placeholder="data pertama" onkeyup="dataPertama(this.value, document.getElementById('data-kedua').value)" id="data-pertama" type="text">
    <input placeholder="data kedua" onkeyup="dataKedua(this.value, document.getElementById('data-pertama').value)" id="data-kedua" type="text"> --}}

    <script type="text/javascript" src="{{ asset('template/adminbsb/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('template/adminbsb/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('template/adminbsb/plugins/jquery-validation/localization/messages_id.js') }}"></script>



    <script type="text/javascript">
        // let dataPertama = (thisVAL, otherVAL) => {
        //     if(thisVAL > 0 && otherVAL == 0) {
        //         document.getElementById('validate').innerHTML = 'data kedua masih kosong!'
        //         document.getElementById('submit').disabled = true
        //     } else if(otherVAL > 0 && thisVAL == 0) {
        //         document.getElementById('validate').innerHTML = 'data pertama masih kosong!'
        //         document.getElementById('submit').disabled = true
        //     } else if(thisVAL == 0 && otherVAL == 0) {
        //         document.getElementById('validate').innerHTML = ''
        //         document.getElementById('submit').disabled = true
        //     } else if(thisVAL > 0 && otherVAL > 0) {
        //         document.getElementById('validate').innerHTML = ''
        //         document.getElementById('submit').disabled = false
        //     }
        // }
        //
        // let dataKedua = (thisVAL, otherVAL) => {
        //     if(thisVAL > 0 && otherVAL == 0) {
        //         document.getElementById('validate').innerHTML = 'data kedua masih kosong!'
        //         document.getElementById('submit').disabled = true
        //     } else if(otherVAL > 0 && thisVAL == 0) {
        //         document.getElementById('validate').innerHTML = 'data pertama masih kosong!'
        //         document.getElementById('submit').disabled = true
        //     } else if(thisVAL == 0 && otherVAL == 0) {
        //         document.getElementById('validate').innerHTML = ''
        //         document.getElementById('submit').disabled = true
        //     } else if(thisVAL > 0 && otherVAL > 0) {
        //         document.getElementById('validate').innerHTML = ''
        //         document.getElementById('submit').disabled = false
        //     }
        // }

        // VANILLA JAVASCRIPT
        document.getElementById('submit').addEventListener('click', () => {
            for (var i = 1; i <= 4; i++) {
                var $dataPertama = document.getElementById('data-pertama'+i).value
                var $dataKedua = document.getElementById('data-kedua'+i).value


                if($dataPertama > 0 && $dataKedua == 0) {
                    document.getElementById('validate'+i).innerHTML = 'Data kedua kosong!'
                } else if($dataKedua > 0 && $dataPertama  == 0) {
                    document.getElementById('validate'+i).innerHTML = 'Data pertama kosong!'
                } else if($dataPertama > 0 && $dataKedua > 0) {
                    document.getElementById('validate'+i).innerHTML = ''
                }
            }
        })


        // REQUIRED SEMUA ATAU JIKA VOLUME DIISI MAKA DPP JUGA HARUS DIISI
        // MULAI VALIDASI PADA SAAT KLIK SUBMIT

        // JQUERY

        $('#form-jquery').validate({
            submitHandler: function(form) {
                test(form)

            }
        })

        function test(form) {
            var checkIsValid = true; // TRUE KARENA NILAI INPUT DEFAULT FALSE JIKA TRUE BERARTI TERISI SEMUA
            for (var i = 1; i <= 4; i++) {
                var $volume = clean_number($('#volume'+i).val());
                var $dpp = clean_number( $('#dpp'+i).val());

                 if($volume > 0 && $dpp == 0) {
                    checkIsValid = false;
                    $('#validate-jquery'+i).text('Harap isi Dpp!');
                    break;
                }
                 else if($volume == 0 && $dpp > 0) {
                    checkIsValid = false;
                    $('#validate-jquery'+i).text('Harap isi Volume!');
                    break;
                }

                if(checkIsValid == true) {
                    $('#validate-jquery'+i).text('');
                }

            }

            if(checkIsValid == true) {
                console.log('test')
            }




            // if(checkIsValid == true) {
            //     // form.submit()
            //     console.log('submit!')
            //     $('#validate-jquery'+i).text('');
            //     $('#validate-checkbox-jquery').text('');
            // }
        }

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

            return true;
        }

        function clean_number(numb)
        {
            var x = parseInt(String(numb).replace(/\./gi, ''));
            if (x > 0) {
                return x;
            } else {
                return 0;
            }
        }
    </script>
    </body>
</html>

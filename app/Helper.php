<?php

function fdate($date) {
	setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	return strftime('%A %d %B %Y', strtotime($date));
}

// TERBILANG NEW
// SATU JUTA DUA RIBU RUPIAH
function terbilang_new($nilai, $suffix = '') {
    $nilai = abs($nilai);
    $huruf = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = terbilang($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = terbilang($nilai/10)." puluh". terbilang($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . terbilang($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = terbilang($nilai/100) . " ratus" . terbilang($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . terbilang($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = terbilang($nilai/1000) . " ribu" . terbilang($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = terbilang($nilai/1000000) . " juta" . terbilang($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = terbilang($nilai/1000000000) . " milyar" . terbilang(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = terbilang($nilai/1000000000000) . " trilyun" . terbilang(fmod($nilai,1000000000000));
    }
    return $temp.$suffix;
}

// TERBILANG OLD
// SATU JUTA DUA RIBU RUPIAH
function terbilang_old($num, $suffix = '') {
    $ones = array
    (
        "", "satu ", "dua ", "tiga ", "empat ", "lima ",
        "enam ", "tujuh ", "delapan ", "sembilan ",
        "satu " => "se",
    );

    $tens = array
    (
        "sepuluh ", "sebelas ", "dua belas ", "tiga belas ", "empat belas ", "lima belas ",
        "enam belas ", "tujuh belas ", "delapan belas ", "sembilan belas "
    );

    $twenties = array
    (
        "", "sepuluh ", "dua puluh ", "tiga puluh ", "empat puluh ", "lima puluh ",
        "enam puluh ", "tujuh puluh ", "delapan puluh ", "sembilan puluh ",
    );

    $thousands = array
    (
        "", "ribu ", "juta ", "miliar ", "triliun ", "dwiyar ", "trita ",
        "sektiliun ", "septiliun ", "oktiliun ", "noniliun ", "desiliun ",
        "undesiliun ", "duodesiliun ", "tredesiliun ", "quatordesiliun ",
        "quindesiliun ", "sekdesiliun ", "septendesiliun ", "oktodesiliun ",
        "novemdesiliun ", "vigintiliun ", "centiliun ",
    );

    $n3 = array();
    $ns = (string) sprintf('%33.0f',$num);

    for( $i=3; $i<34; $i+=3 )
    {
        $r = substr( $ns, -$i );
        $q = strlen( $ns ) - $i;

        if( $q < -2 ) break;
        else
        {
            if( $q >= 0 ) $n3 [] = ( float ) substr( $r, 0, 3 );
            elseif( $q >=-1 ) $n3 [] = ( float ) substr( $r, 0, 2 );
            elseif( $q >=-2 ) $n3 [] = ( float ) substr( $r, 0, 1 );
        }
    }

    $nw = '';
    foreach( $n3 as $i => $x )
    {
        $d1 = floor( $x % 10 );
        $d2 = floor( ( $x % 100 ) / 10 );
        $d3 = floor( ( $x % 1000 ) / 100 );

        if( $x == 0 ) continue;
        else $t = $thousands[ $i ];

        if( $d2 == 0 ) $nw = sprintf( '%s%s%s',
            ( ( isset( $ones[ $ones[$d1] ] ) AND $i<2 )? $ones[ $ones[$d1] ] : $ones[$d1] ),
            $t, $nw
        );

        elseif( $d2 == 1 ) $nw = sprintf( '%s%s%s', $tens[$d1], $t, $nw );
        elseif( $d2 > 1 ) $nw = sprintf( '%s%s%s%s', $twenties[$d2],
            ( ( isset( $ones[ $ones[$d1] ] ) AND $i<2 )? $ones[ $ones[$d1] ] : $ones[$d1] ),
            $t, $nw
        );

        if( $d3 > 0 ) $nw = sprintf( '%s%s%s',
            ( ( isset( $ones[ $ones[$d3] ] ) )? $ones[ $ones[$d3] ] : $ones[$d3] ),
            'ratus ', $nw
        );
    }

    return strtoupper($nw.$suffix);
}

function address($village_id) {
	$village = App\Models\Village::find($village_id);
	return village($village['id']).' Kec. '.district($village['district']['id']).' '.regency($village['district']['regency']['id']).' '.province($village['district']['regency']['province']['id']);
}

function province($code) {
	return ucwords(strtolower(App\Models\Province::find($code)['name']));
}

function regency($code) {
	return ucwords(strtolower(App\Models\Regency::find($code)['name']));
}

function district($code) {
	return ucwords(strtolower(App\Models\District::find($code)['name']));
}

function village($code) {
	return ucwords(strtolower(App\Models\Village::find($code)['name']));
}

function provinces() {
	return App\Models\Province::pluck('name', 'id')->toArray();
}

function regencies($province_id) {
	return App\Models\Regency::where('province_id', $province_id)->pluck('name', 'id')->toArray();
}

function districts($regency_id) {
	return App\Models\District::where('regency_id', $regency_id)->pluck('name', 'id')->toArray();
}

function villages($district_id) {
	return App\Models\Village::where('district_id', $district_id)->pluck('name', 'id')->toArray();
}

// S3 = Doktor (S3)
function educations($level = null) {
    $levels = [
    	'S3' => 'Doktor (S3)',
    	'S2' => 'Magister (S2)',
    	'S1' => 'Sarjana (S1)',
    	'D4' => 'Diploma (D4)',
    	'D3' => 'Diploma (D3)',
    	'D2' => 'Diploma (D2)',
    	'D1' => 'Diploma (D1)',
    	'SMA' => 'SMA/Sederajat',
    	'SMP' => 'SMP/Sederajat',
    	'SD' => 'SD/Sederajat',
    	'TK' => 'TK/Sederajat',
    ];
    if ($level) return $levels[$level];
    return $levels;
}

// 1 = JANUARY
function month($month = null) {
	$key = [
		'01' => 'Januari',
		'1' => 'Januari',
		'02' => 'Februari',
		'2' => 'Februari',
		'03' => 'Maret',
		'3' => 'Maret',
		'04' => 'April',
		'4' => 'April',
		'05' => 'Mei',
		'5' => 'Mei',
		'06' => 'Juni',
		'6' => 'Juni',
		'07' => 'Juli',
		'7' => 'Juli',
		'08' => 'Agustus',
		'8' => 'Agustus',
		'09' => 'September',
		'9' => 'Septembers',
		'10' => 'November',
		'12' => 'Desember',
 	];

	if($month)
		return $key[$month];
	return $key;
}

// 127.0.0.1
function getUserIp() {
    return $_SERVER['REMOTE_ADDR'] ? : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? : $_SERVER['HTTP_CLIENT_IP']);
}

?>

<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 18-Jul-18
 * Time: 10:03 AM
 */
function rp($angka){
    $hasil=number_format($angka,2,'.',',');
    return $hasil ;
}

function rupiah($angka, $style=4) {
//    if($x<0) {
//        $hasil = "minus ". trim(kekata($x));
//    } else {
//        $hasil = trim(kekata($x));
//    }
    switch ($style) {
        case 1:
            $hasil='Rp'.number_format($angka,0,',','.');
            break;
        case 2:
            $hasil='Rp '.number_format($angka,2,',','.');

            break;
        case 3:
            $hasil=number_format($angka,0,',','.');
            break;
        default:
            $hasil=number_format($angka,2,',','.');
            break;
    }
    return $hasil;
}

function getpersen($id){
    $spk=\App\Models\Spk::where('id',$id)->get();
//    foreach ($spk->detailHarga as $sp){
//        $harga[]=$sp->harga*$sp->jumlah;
//    }

    foreach ($spk as $ok){
      $bayar[]=$ok->persen;
    }
    $baru_bayar=array_sum($bayar);
    $data=100-$baru_bayar;
    return $data;
}
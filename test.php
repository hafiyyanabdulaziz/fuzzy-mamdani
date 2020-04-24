<?php
include "fuzzy/grafik.php";
$ssuhu = 33.5;
$kkelembapan = 53.4;
$ttinggiair = 4;

function inferensi($suhu, $kelembapan, $tinggiair)
{
    $x = 0;
    $no = 1;
    $kondisi = [];
    $nilaisuhu = [suhuminimum($suhu), suhuoptimal($suhu), suhumaksimal($suhu)];
    $nilaikelembapan = [tidaklembab($kelembapan), sangatsesuai($kelembapan), lembab($kelembapan)];
    $nilaitinggiair = [tinggiairkering($tinggiair), tinggiairideal($tinggiair), tinggiairbanjir($tinggiair)];

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                if (($nilaisuhu[$i] > 0) && ($nilaikelembapan[$j] > 0) && ($nilaitinggiair[$k] > 0)) {
                    $minimal = min($nilaisuhu[$i], $nilaikelembapan[$j], $nilaitinggiair[$k]);
                    if ($k == 0) {
                        $kondisi[$x] = "Banyak";
                    } else if (($i == 2) && ($k == 1) && ($j < 2)) {
                        $kondisi[$x] = "Banyak";
                    } else {
                        $kondisi[$x] = "Sedikit";
                    }
                    echo $no . ". IF Suhu = " . $nilaisuhu[$i] . " AND Kelembapan = " . $nilaikelembapan[$j] . " AND Tinggi Air = " . $nilaitinggiair[$k] . " THAN Debit Irigasi = " . $kondisi[$x] . "(" . $minimal . ")<br>";
                    $x++;
                }
                $no++;
            }
        }
    }
}
inferensi($ssuhu, $kkelembapan, $ttinggiair);

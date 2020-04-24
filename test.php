<?php
include "fuzzy/grafik.php";
$ssuhu = 32.5;
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
                    $minimal[$x] = min($nilaisuhu[$i], $nilaikelembapan[$j], $nilaitinggiair[$k]);
                    if ($k == 0) {
                        $kondisi[$x] = "Banyak";
                    } else if (($i == 2) && ($k == 1) && ($j < 2)) {
                        $kondisi[$x] = "Banyak";
                    } else {
                        $kondisi[$x] = "Sedikit";
                    }
                    echo $x;
                    echo "<br>";
                    echo $no . ". IF Suhu = " . $nilaisuhu[$i] . " AND Kelembapan = " . $nilaikelembapan[$j] . " AND Tinggi Air = " . $nilaitinggiair[$k] . " THAN Debit Irigasi = " . $kondisi[$x] . "(" . $minimal[$x] . ")<br>";
                    $x++;
                }
                $no++;
            }
        }
    }

    //defuzzifikasi
    $nilai_banyak = 0;
    $nilai_sedikit = 0;
    for ($l = 0; $l < 4; $l++) {
        if ($kondisi[$l]  == "Banyak") {
            $nilai_banyak = max($minimal[$l], $nilai_banyak);
        } else {
            $nilai_sedikit = max($minimal[$l], $nilai_sedikit);
        }
    }
    echo "<h4><b>Nilai Fuzzy Output: </b></h4>";
    echo "<p>Debit Irigasi Banyak(" . $nilai_banyak . ")</p>";
    echo "<p>Debit Irigasi Sedikit( " . $nilai_sedikit . ")</p>";
}
function nilaifuzzyoutputsedikit()
{
}
function nilaifuzzyoutputbanyak()
{
}
inferensi($ssuhu, $kkelembapan, $ttinggiair);

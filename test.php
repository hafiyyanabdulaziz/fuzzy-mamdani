<?php
include "fuzzy/grafik.php";
$ssuhu = 33.5;
$kkelembapan = 53.4;
$ttinggiair = 1;

function inferensi($suhu, $kelembapan, $tinggiair)
{
    $x = 0;
    $nilaisuhu = [suhuminimum($suhu), suhuoptimal($suhu), suhumaksimal($suhu)];
    $nilaikelembapan = [tidaklembab($kelembapan), sangatsesuai($kelembapan), lembab($kelembapan)];
    $nilaitinggiair = [tinggiairkering($tinggiair), tinggiairideal($tinggiair), tinggiairbanjir($tinggiair)];

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            for ($k = 0; $k < 3; $k++) {
                if (($nilaisuhu[$i] > 0) && ($nilaikelembapan[$j] > 0) && ($nilaitinggiair[$k] > 0)) {
                    echo "suhu" . $nilaisuhu[$i];
                    echo "<br>";
                    echo "kelembapan" . $nilaikelembapan[$j];
                    echo "<br>";
                    echo "tinggi air" . $nilaitinggiair[$k];
                    echo "<br>";
                    echo "nilai min " . min($nilaisuhu[$i], $nilaikelembapan[$j], $nilaitinggiair[$k]);
                    echo "<br>";
                    /*
                    if ($k == 0) {
                        echo $x;
                        echo "<br>";
                        //$kondisi[$x] == "Banyak";
                    }
                    */
                    $x++;
                    //echo $kondisi[$x];
                    //echo "<br>";
                }
            }
        }
    }

    //return $nilaikelembapan[0];
}
echo inferensi($ssuhu, $kkelembapan, $ttinggiair);

<?php
function grafikfungsikeanggotaansuhu()
{
?>
    <h5>Fungsi Keanggotaan Suhu</h5>
    <img src="_assets/img/suhu.jpg" class="img-fluid" alt="Grafik Suhu">
    <br>
<?php
}
function grafikfungsikeanggotaankelembapan()
{
?>
    <h5>Fungsi Keanggotaan Kelembapan</h5>
    <img src="_assets/img/kelembapan.jpg" class="img-fluid" alt="Grafik Kelembapan">
    <br>
<?php
}
function grafikfungsikeanggotaantinggiair()
{
?>
    <h5>Fungsi Keanggotaan Tinggi Air</h5>
    <img src="_assets/img/tinggiair.jpg" class="img-fluid" alt="Grafik Tinggi Air">
    <br>
<?php
}
function grafikoutput()
{
?>
    <h4>Output</h4>
    <p>Outputnya adalah Debit Irigasi</p>
    <img src="_assets/img/debitirigasi.jpg" class="img-fluid" alt="Grafik Debit Irigasi">
    <br>
<?php
}
function gambarrules()
{
?>
    <p>Daftar Rules:</p>
    <img src="_assets/img/rules.jpg" class="img-fluid" alt="Daftar Rules">
    <br>
<?php
}
function nilaigrafiksuhu($suhu)
{
    if (suhuminimum($suhu) != 0) {
        echo "Minimum (" . suhuminimum($suhu) . ")";
        echo "<br>";
    }
    if (suhuoptimal($suhu) != 0) {
        echo "Optimal (" . suhuoptimal($suhu) . ")";
        echo "<br>";
    }
    if (suhumaksimal($suhu) != 0) {
        echo "Maksimal (" . suhumaksimal($suhu) . ")";
        echo "<br>";
    }
    echo "<br>";
}
function nilaigrafikkelembapan($kelembapan)
{
    if (tidaklembab($kelembapan) != 0) {
        echo "Tidak Lembab (" . tidaklembab($kelembapan) . ")";
        echo "<br>";
    }
    if (sangatsesuai($kelembapan) != 0) {
        echo "Sangat Sesuai (" . sangatsesuai($kelembapan) . ")";
        echo "<br>";
    }
    if (lembab($kelembapan) != 0) {
        echo "Lembab (" . lembab($kelembapan) . ")";
        echo "<br>";
    }
    echo "<br>";
}
function nilaigrafiktinggiair($tinggiair)
{
    if (tinggiairkering($tinggiair) != 0) {
        echo "Kering (" . tinggiairkering($tinggiair) . ")";
        echo "<br>";
    }
    if (tinggiairideal($tinggiair) != 0) {
        echo "Ideal (" . tinggiairideal($tinggiair) . ")";
        echo "<br>";
    }
    if (tinggiairbanjir($tinggiair) != 0) {
        echo "Banjir (" . tinggiairbanjir($tinggiair) . ")";
        echo "<br>";
    }
    echo "<br>";
}
function hasilfuzzifikasi($suhu, $kelembapan, $tinggiair)
{
    echo "<h4><b>Hasil Fuzzifikasi: </b></h4>";
    echo "<p><b>Nilai Fuzzy Suhu: </b></p>";
    nilaigrafiksuhu($suhu);
    echo "<p><b>Nilai Fuzzy Kelembapan: </b></p>";
    nilaigrafikkelembapan($kelembapan);
    echo "<p><b>Nilai Fuzzy Tinggi Air: </b></p>";
    nilaigrafiktinggiair($tinggiair);
}
function inferensi($suhu, $kelembapan, $tinggiair)
{
    echo "<h4><b>Rules yang digunakan: </b></h4>";
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
                    echo "<p>" . $no . ". IF Suhu = " . $nilaisuhu[$i] . " AND Kelembapan = " . $nilaikelembapan[$j] . " AND Tinggi Air = " . $nilaitinggiair[$k] . " THAN Debit Irigasi = " . $kondisi[$x] . "(" . $minimal[$x] . ")</p>";
                    $x++;
                }
                $no++;
            }
        }
    }
    //Nilai Fuzzy Output
    $nilai_banyak = 0;
    $nilai_sedikit = 0;
    for ($l = 0; $l < $x; $l++) {
        if ($kondisi[$l]  == "Banyak") {
            $nilai_banyak = max($minimal[$l], $nilai_banyak);
        } else {
            $nilai_sedikit = max($minimal[$l], $nilai_sedikit);
        }
    }
    echo "<h4><b>Nilai Fuzzy Output: </b></h4>";
    echo "<p>Debit Irigasi Banyak(" . $nilai_banyak . ")</p>";
    echo "<p>Debit Irigasi Sedikit( " . $nilai_sedikit . ")</p>";
    //Defuzzifikasi
    $nilaiy = ((10 * $nilai_sedikit) + (40 * $nilai_banyak) + 0.5) / ((4 * $nilai_sedikit) + (5 * $nilai_banyak) + 0.5);
    echo "<h4><b>Banyaknya Debit Irigasi: </b>" . $nilaiy . " L/s/Ha</h4>";
}
function suhuminimum($suhu)
{
    $nilaisuhuminimum = 0;
    //suhu minimum
    if ($suhu <= 5) {
        $nilaisuhuminimum = 1;
    } else {
        if ($suhu < 15) {
            $nilaisuhuminimum = (15 - $suhu) / 10;
        } else {
            $nilaisuhuminimum = 0;
        }
    }
    return $nilaisuhuminimum;
}
function suhuoptimal($suhu)
{
    $nilaisuhuoptimal = 0;
    //suhu optimal
    if ($suhu >= 15 && $suhu <= 35) {
        if ($suhu >= 25 && $suhu <= 30) {
            $nilaisuhuoptimal = 1;
        } else {
            if ($suhu >= 15 && $suhu < 25) {
                $nilaisuhuoptimal = ($suhu - 15) / 10;
            } else {
                if ($suhu > 30 && $suhu < 35) {
                    $nilaisuhuoptimal = (35 - $suhu) / 5;
                } else {
                    $nilaisuhuoptimal = 0;
                }
            }
        }
    }
    return $nilaisuhuoptimal;
}
function suhumaksimal($suhu)
{
    $nilaisuhumaksimal = 0;
    //suhu maksimal
    if ($suhu >= 35) {
        $nilaisuhumaksimal = 1;
    } else {
        if ($suhu >= 30 && $suhu < 35) {
            $nilaisuhumaksimal = ($suhu - 30) / 5;
        } else {
            $nilaisuhumaksimal = 0;
        }
    }
    return $nilaisuhumaksimal;
}

function tidaklembab($kelembapan)
{
    $kelembapantidaklembab = 0;
    //tidak LEMBAB
    if ($kelembapan <= 50) {
        $kelembapantidaklembab = 1;
    } else {
        if ($kelembapan < 60) {
            $kelembapantidaklembab = (60 - $kelembapan) / 10;
        } else {
            $kelembapantidaklembab = 0;
        }
    }
    return $kelembapantidaklembab;
}
function sangatsesuai($kelembapan)
{
    $nilaikelembapansangatsesuai = 0;
    //sangat sesuai
    if ($kelembapan >= 50 && $kelembapan <= 80) {
        if ($kelembapan >= 60 && $kelembapan <= 70) {
            $nilaikelembapansangatsesuai = 1;
        } else {
            if ($kelembapan >= 50 && $kelembapan < 60) {
                $nilaikelembapansangatsesuai = ($kelembapan - 50) / 10;
            } else {
                if ($kelembapan > 70 && $kelembapan < 80) {
                    $nilaikelembapansangatsesuai = (80 - $kelembapan) / 10;
                } else {
                    $nilaikelembapansangatsesuai = 0;
                }
            }
        }
    }
    return $nilaikelembapansangatsesuai;
}
function lembab($kelembapan)
{
    $kelembapanlembab = 0;
    //LEMBAB
    if ($kelembapan >= 85) {
        $kelembapanlembab = 1;
    } else {
        if ($kelembapan >= 83 && $kelembapan < 85) {
            $kelembapanlembab = ($kelembapan - 83) / 2;
        } else {
            $kelembapanlembab = 0;
        }
    }
    return $kelembapanlembab;
}
function tinggiairkering($tinggiair)
{
    $nilaitinggiairkering = 0;
    //tinggi air kering
    if ($tinggiair <= 1) {
        $nilaitinggiairkering = 1;
    } else {
        if ($tinggiair <= 2) {
            $nilaitinggiairkering = (2 - $tinggiair);
        } else {
            $nilaitinggiairkering = 0;
        }
    }
    return $nilaitinggiairkering;
}
function tinggiairideal($tinggiair)
{
    $nilaitinggiairideal = 0;
    //tinggi air ideal
    if ($tinggiair >= 2 && $tinggiair <= 7) {
        if ($tinggiair >= 3 && $tinggiair <= 5) {
            $nilaitinggiairideal = 1;
        } else {
            if ($tinggiair >= 2 && $tinggiair < 3) {
                $nilaitinggiairideal = ($tinggiair - 2);
            } else {
                if ($tinggiair > 5 && $tinggiair <= 8) {
                    $nilaitinggiairideal = (8 - $tinggiair) / 3;
                } else {
                    $nilaitinggiairideal = 0;
                }
            }
        }
    }
    return $nilaitinggiairideal;
}
function tinggiairbanjir($tinggiair)
{
    $nilaitinggiairbanjir = 0;
    //tinggi air banjir
    if ($tinggiair > 10) {
        $nilaitinggiairbanjir = 1;
    } else {
        if ($tinggiair >= 8 && $tinggiair <= 10) {
            $nilaitinggiairbanjir = ($tinggiair - 8) / 2;
        } else {
            $nilaitinggiairbanjir = 0;
        }
    }
    return $nilaitinggiairbanjir;
}
?>
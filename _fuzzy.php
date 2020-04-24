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
/*
function rulesdigunakan($suhu, $kelembapan, $tinggiair)
{
    echo "<p><b>Rules yang digunakan: </b></p>";
    echo "<br>";
    rules($suhu, $kelembapan, $tinggiair);
}
*/
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
?>
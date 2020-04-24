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
function nilaigrafiksuhu($suhu)
{
    if (suhuminimum($suhu) != 0) {
        echo "Suhu Minimum (" . suhuminimum($suhu) . ")";
        echo "<br>";
    }
    if (suhuoptimal($suhu) != 0) {
        echo "Suhu Optimal (" . suhuoptimal($suhu) . ")";
        echo "<br>";
    }
    if (suhumaksimal($suhu) != 0) {
        echo "Suhu Maksimal (" . suhumaksimal($suhu) . ")";
        echo "<br>";
    }
    echo "<br>";
}
function nilaigrafikkelembapan($kelembapan)
{
    if (tidaklembab($kelembapan) != 0) {
        echo "Suhu Minimum (" . tidaklembab($kelembapan) . ")";
        echo "<br>";
    }
    if (sangatsesuai($kelembapan) != 0) {
        echo "Suhu Minimum (" . sangatsesuai($kelembapan) . ")";
        echo "<br>";
    }
    if (lembab($kelembapan) != 0) {
        echo "Suhu Minimum (" . lembab($kelembapan) . ")";
        echo "<br>";
    }
    echo "<br>";
}
function nilaigrafiktinggiair($tinggiair)
{
    if (tinggiairkering($tinggiair) != 0) {
        echo "Suhu Minimum (" . tinggiairkering($tinggiair) . ")";
        echo "<br>";
    }
    if (tinggiairideal($tinggiair) != 0) {
        echo "Suhu Minimum (" . tinggiairideal($tinggiair) . ")";
        echo "<br>";
    }
    if (tinggiairbanjir($tinggiair) != 0) {
        echo "Suhu Minimum (" . tinggiairbanjir($tinggiair) . ")";
        echo "<br>";
    }
    echo "<br>";
}
?>
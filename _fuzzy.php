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
    echo "<p><b>Hasil Fuzzifikasi: </b></p>";
    echo "<br>";
    nilaigrafiksuhu($suhu);
    nilaigrafikkelembapan($kelembapan);
    nilaigrafiktinggiair($tinggiair);
}
function rulesdigunakan($suhu, $kelembapan, $tinggiair)
{
    echo "<p><b>Rules yang digunakan: </b></p>";
    echo "<br>";
    rules($suhu, $kelembapan, $tinggiair);
}

?>
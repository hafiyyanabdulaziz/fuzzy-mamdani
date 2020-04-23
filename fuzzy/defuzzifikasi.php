<?php
function defuzzifikasi($suhu, $kelembapan, $tinggiair)
{
    $nilaifuzzysedikit = nilaifuzzysedikit($suhu, $kelembapan, $tinggiair);
    $nilaifuzzybanyak = nilaifuzzybanyak($suhu, $kelembapan, $tinggiair);

    $pembilang = ($nilaifuzzysedikit * 17.5) + ($nilaifuzzybanyak * 72);
    echo "<br>";
    echo "PEMBILANG" . $pembilang;
    echo "<br>";
    $pembagi = ($nilaifuzzybanyak * 7) + ($nilaifuzzybanyak * 9);
    echo "<br>";
    echo "PEMBAGI" . $pembagi;
    echo "<br>";
    $defuzzyfikasi = $pembilang / $pembagi;
    echo "<br>";
    echo "<br>";
    echo $defuzzyfikasi;
}

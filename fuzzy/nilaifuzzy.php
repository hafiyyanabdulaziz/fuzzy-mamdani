<?php
function menampilkannilaiinput($suhu, $kelembapan, $tinggiair)
{
    echo "<h2>Solusi</h2>";
    echo "Suhu : " . $_POST['suhu'];
    echo "<br>";
    echo "Kelembapan : " . $_POST['kelembapan'];
    echo "<br>";
    echo "Tiggi Air : " . $_POST['tinggiair'];
    echo "<br>";
    echo "<br>";
}

function nilaifuzzybanyak($suhu, $kelembapan, $tinggiair)
{
    //$arrayfuzzybanyak = array();
    //$arrayfuzzybanyak[] = min($suhu, $kelembapan, $tinggiair);
    //return max($arrayfuzzybanyak);
    return min($suhu, $kelembapan, $tinggiair);
}

function nilaifuzzysedikit($suhu, $kelembapan, $tinggiair)
{
    //$arrayfuzzysedikit = array();
    //$arrayfuzzysedikit[] = min($suhu, $kelembapan, $tinggiair);
    //return max($arrayfuzzysedikit);
    return min($suhu, $kelembapan, $tinggiair);
}

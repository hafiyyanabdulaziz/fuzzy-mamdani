<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Racezzy</title>
</head>

<body>
    <form method="post" action="">
        <table>
            <tr>
                <td>Suhu</td>
                <td> : </td>
                <td><input type="number" name="suhu" placeholder="Masukkan 0-100" required> Derajat Selsius</td>
            </tr>
            <tr>
                <td>Kelembapan</td>
                <td> : </td>
                <td><input type="number" name="kelembapan" placeholder="Masukkan 0-100" required> %</td>
            </tr>
            <tr>
                <td>Tinggi Air</td>
                <td>: </td>
                <td><input type="number" name="tinggiair" placeholder="Masukkan 0-15" required> cm</td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
if (isset($_POST["submit"])) {
    menampilkannilaiinput($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
    menghitungnilaigrafik($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
}
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
function menghitungnilaigrafik($suhu, $kelembapan, $tinggiair)
{
    grafiksuhu($suhu);
    grafikkelembapan($kelembapan);
    grafiktinggiair($tinggiair);
}
function grafiksuhu($suhu)
{
    echo "Nilai Suhu Minimum = " . suhuminimum($suhu);
    echo "<br>";
    echo "Nilai Suhu optimal = " . suhuoptimal($suhu);
    echo "<br>";
    echo "Nilai Suhu Maksimal = " . suhumaksimal($suhu);
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
function grafikkelembapan($kelembapan)
{
    echo "<br>";
    echo "<br>";
    echo "Nilai Kelembapan Tidak Lembab = " . tidaklembab($kelembapan);
    echo "<br>";
    echo "Nilai Kelembapan Sangat Sesuai = " . sangatsesuai($kelembapan);
    echo "<br>";
    echo "Nilai Kelembapan Lembab = " . lembab($kelembapan);
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
function grafiktinggiair($tinggiair)
{
    echo "<br>";
    echo "<br>";
    echo "Nilai Tinggi Air Kering = " . tinggiairkering($tinggiair);
    echo "<br>";
    echo "Nilai Tinggi Air Ideal = " . tinggiairideal($tinggiair);
    echo "<br>";
    echo "Nilai Tinggi Air Banjir = " . tinggiairbanjir($tinggiair);
    echo "<br>";
    echo "<br>";
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
function nilaifuzzybanyak($suhu, $kelembapan, $tinggiair)
{
    $arrayfuzzybanyak = array();
    $arrayfuzzybanyak[] = min($suhu, $kelembapan, $tinggiair);
    echo "Nilai Fuzzy Banyak: ";
    echo max($arrayfuzzybanyak);
    echo "<br>";
}
function nilaifuzzysedikit($suhu, $kelembapan, $tinggiair)
{
    $arrayfuzzysedikit = array();
    $arrayfuzzysedikit[] = min($suhu, $kelembapan, $tinggiair);
    echo "Nilai Fuzzy Sedikit: ";
    echo max($arrayfuzzysedikit);
}
//RULES
if (isset($_POST["submit"])) {
    //MINIMUM-TIDAK LEMBAB
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] <= 2) {
        $irigasi = "1 1 1";
        nilaifuzzybanyak(suhuminimum($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] <= 60 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "1 1 2";
        nilaifuzzysedikit(suhuminimum($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] >= 8) {
        $irigasi = "1 1 3";
        nilaifuzzysedikit(suhuminimum($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //MINIMUM-SANGAT SESUAI
    if ($_POST['suhu'] <= 15 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] <= 2) {
        $irigasi = "1 2 1";
        nilaifuzzybanyak(suhuminimum($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if ($_POST['suhu'] <= 15 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "1 2 2";
        nilaifuzzysedikit(suhuminimum($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if ($_POST['suhu'] <= 15 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] >= 8) {
        $irigasi = "1 2 3";
        nilaifuzzysedikit(suhuminimum($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //MINIMUM-LEMBAB
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2) {
        $irigasi = "1 3 1";
        nilaifuzzybanyak(suhuminimum($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "1 3 2";
        nilaifuzzysedikit(suhuminimum($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] >= 8) {
        $irigasi = "1 3 3";
        nilaifuzzysedikit(suhuminimum($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //OPTIMAL-TIDAK LEMBAB
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] <= 2) {
        $irigasi = "2 1 1";
        nilaifuzzybanyak(suhuoptimal($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] <= 60 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "2 1 2";
        nilaifuzzysedikit(suhuoptimal($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] >= 8) {
        $irigasi = "2 1 3";
        nilaifuzzysedikit(suhuoptimal($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //OPTIMAL-SANGAT SESUAI
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] <= 2) {
        $irigasi = "2 2 1";
        nilaifuzzybanyak(suhuoptimal($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "2 2 2";
        nilaifuzzysedikit(suhuoptimal($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] >= 8) {
        $irigasi = "2 2 3 ";
        nilaifuzzysedikit(suhuoptimal($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //OPTIMAL-LEMBAB
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2) {
        $irigasi = "2 3 1 ";
        nilaifuzzybanyak(suhuoptimal($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] >= 80 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "2 3 2 ";
        nilaifuzzysedikit(suhuoptimal($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] >= 8) {
        $irigasi = "2 3 3 ";
        nilaifuzzysedikit(suhuoptimal($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //MASIMUM-TIDAK LEMBAB
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] <= 2) {
        $irigasi = "3 1 1 ";
        nilaifuzzybanyak(suhumaksimal($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] <= 60 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "3 1 2 ";
        nilaifuzzybanyak(suhumaksimal($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] >= 8) {
        $irigasi = "3 1 3 ";
        nilaifuzzysedikit(suhumaksimal($_POST['suhu']), tidaklembab($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //MAKSIMUM-SANGAT SESUAI
    if ($_POST['suhu'] >= 30 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] <= 2) {
        $irigasi = "3 2 1";
        nilaifuzzybanyak(suhumaksimal($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if ($_POST['suhu'] >= 30 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "3 2 2 ";
        nilaifuzzybanyak(suhumaksimal($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if ($_POST['suhu'] >= 30 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] >= 8) {
        $irigasi = "3 2 3 ";
        nilaifuzzysedikit(suhumaksimal($_POST['suhu']), sangatsesuai($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    //MAKSIMUM-LEMBAB
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2) {
        $irigasi = "3 3 1 ";
        nilaifuzzybanyak(suhumaksimal($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairkering($_POST['tinggiair']));
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "3 3 2 ";
        nilaifuzzysedikit(suhumaksimal($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairideal($_POST['tinggiair']));
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] >= 8) {
        $irigasi = "3 3 3 ";
        nilaifuzzysedikit(suhumaksimal($_POST['suhu']), lembab($_POST['kelembapan']), tinggiairbanjir($_POST['tinggiair']));
    }
    echo "<br>";
    echo $irigasi;
}

?>
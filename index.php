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
//GRAFIK SUHU
$nilaisuhuminimum = 0;
$nilaisuhuoptimal = 0;
$nilaisuhumaksimal = 0;
if (isset($_POST["submit"])) {
    echo "<h2>Solusi</h2>";
    echo "Suhu : " . $_POST['suhu'];
    echo "<br>";
    echo "Kelembapan : " . $_POST['kelembapan'];
    echo "<br>";
    echo "Tiggi Air : " . $_POST['tinggiair'];
    echo "<br>";
    echo "<br>";
    //suhu minimum
    if ($_POST['suhu'] <= 5) {
        $nilaisuhuminimum = 1;
    } else {
        if ($_POST['suhu'] < 15) {
            $nilaisuhuminimum = (15 - $_POST['suhu']) / 10;
        } else {
            $nilaisuhuminimum = 0;
        }
    }
    //suhu optimal
    if ($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) {
        if ($_POST['suhu'] >= 25 && $_POST['suhu'] <= 30) {
            $nilaisuhuoptimal = 1;
        } else {
            if ($_POST['suhu'] >= 15 && $_POST['suhu'] < 25) {
                $nilaisuhuoptimal = ($_POST['suhu'] - 15) / 10;
            } else {
                if ($_POST['suhu'] > 30 && $_POST['suhu'] < 35) {
                    $nilaisuhuoptimal = (35 - $_POST['suhu']) / 5;
                } else {
                    $nilaisuhuoptimal = 0;
                }
            }
        }
    }
    //suhu maksimal
    if ($_POST['suhu'] >= 35) {
        $nilaisuhumaksimal = 1;
    } else {
        if ($_POST['suhu'] >= 30 && $_POST['suhu'] < 35) {
            $nilaisuhumaksimal = ($_POST['suhu'] - 30) / 5;
        } else {
            $nilaisuhumaksimal = 0;
        }
    }
    echo "Nilai Suhu Minimum = $nilaisuhuminimum";
    echo "<br>";
    echo "Nilai Suhu optimal = $nilaisuhuoptimal";
    echo "<br>";
    echo "Nilai Suhu Maksimal = $nilaisuhumaksimal";
}
//GRAFIK KELEMBAPAN
$kelembapantidaklembab = 0;
$nilaikelembapansangatsesuai = 0;
$kelembapanlembab = 0;
if (isset($_POST["submit"])) {
    //tidak LEMBAB
    if ($_POST['kelembapan'] <= 50) {
        $kelembapantidaklembab = 1;
    } else {
        if ($_POST['kelembapan'] < 60) {
            $kelembapantidaklembab = (60 - $_POST['kelembapan']) / 10;
        } else {
            $kelembapantidaklembab = 0;
        }
    }
    //sangat sesuai
    if ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) {
        if ($_POST['kelembapan'] >= 60 && $_POST['kelembapan'] <= 70) {
            $nilaikelembapansangatsesuai = 1;
        } else {
            if ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] < 60) {
                $nilaikelembapansangatsesuai = ($_POST['kelembapan'] - 50) / 10;
            } else {
                if ($_POST['kelembapan'] > 70 && $_POST['kelembapan'] < 80) {
                    $nilaikelembapansangatsesuai = (80 - $_POST['kelembapan']) / 10;
                } else {
                    $nilaikelembapansangatsesuai = 0;
                }
            }
        }
    }
    //LEMBAB
    if ($_POST['kelembapan'] >= 85) {
        $kelembapanlembab = 1;
    } else {
        if ($_POST['kelembapan'] >= 83 && $_POST['kelembapan'] < 85) {
            $kelembapanlembab = ($_POST['kelembapan'] - 83) / 2;
        } else {
            $kelembapanlembab = 0;
        }
    }
    echo "<br>";
    echo "<br>";
    echo "Nilai Kelembapan Tidak Lembab = $kelembapantidaklembab";
    echo "<br>";
    echo "Nilai Kelembapan Sangat Sesuai = $nilaikelembapansangatsesuai";
    echo "<br>";
    echo "Nilai Kelembapan Lembab = $kelembapanlembab";
}
//GRAFIK TINGGI AIR
$nilaitinggiairkering = 0;
$nilaitinggiairideal = 0;
$nilaitinggiairbanjir = 0;
if (isset($_POST["submit"])) {
    //tinggi air kering
    if ($_POST['tinggiair'] <= 1) {
        $nilaitinggiairkering = 1;
    } else {
        if ($_POST['tinggiair'] <= 2) {
            $nilaitinggiairkering = (2 - $_POST['tinggiair']);
        } else {
            $nilaitinggiairkering = 0;
        }
    }
    //tinggi air ideal
    if ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 7) {
        if ($_POST['tinggiair'] >= 3 && $_POST['tinggiair'] <= 5) {
            $nilaitinggiairideal = 1;
        } else {
            if ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] < 3) {
                $nilaitinggiairideal = ($_POST['tinggiair'] - 2);
            } else {
                if ($_POST['tinggiair'] > 5 && $_POST['tinggiair'] <= 8) {
                    $nilaitinggiairideal = (8 - $_POST['tinggiair']) / 3;
                } else {
                    $nilaitinggiairideal = 0;
                }
            }
        }
    }
    //tinggi air banjir
    if ($_POST['tinggiair'] > 10) {
        $nilaitinggiairbanjir = 1;
    } else {
        if ($_POST['tinggiair'] >= 8 && $_POST['tinggiair'] <= 10) {
            $nilaitinggiairbanjir = ($_POST['tinggiair'] - 8) / 2;
        } else {
            $nilaitinggiairbanjir = 0;
        }
    }
    echo "<br>";
    echo "<br>";
    echo "Nilai Tinggi Air Kering = $nilaitinggiairkering";
    echo "<br>";
    echo "Nilai Tinggi Air Ideal = $nilaitinggiairideal";
    echo "<br>";
    echo "Nilai Tinggi Air Banjir = $nilaitinggiairbanjir";
}
function nilaifuzzybanyak($suhu, $kelembapan, $tinggiair)
{
    $arrayfuzzybanyak = array();
    $arrayfuzzybanyak[] = min($suhu, $kelembapan, $tinggiair);
    echo "Nilai Fuzzy Banyak: ";
    echo max($arrayfuzzybanyak);
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
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] <= 60 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "1 1 2";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] >= 8) {
        $irigasi = "1 1 3";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //MINIMUM-SANGAT SESUAI
    if ($_POST['suhu'] <= 15 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] <= 2) {
        $irigasi = "1 2 1";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] <= 15 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "1 2 2";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] <= 15 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] >= 8) {
        $irigasi = "1 2 3";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //MINIMUM-LEMBAB
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2) {
        $irigasi = "1 3 1";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "1 3 2";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] <= 15 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] >= 8) {
        $irigasi = "1 3 3";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //OPTIMAL-TIDAK LEMBAB
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] <= 2) {
        $irigasi = "2 1 1";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] <= 60 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "2 1 2";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] >= 8) {
        $irigasi = "2 1 3";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //OPTIMAL-SANGAT SESUAI
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] <= 2) {
        $irigasi = "2 2 1";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "2 2 2";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] >= 8) {
        $irigasi = "2 2 3 ";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //OPTIMAL-LEMBAB
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2) {
        $irigasi = "2 3 1 ";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] >= 80 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "2 3 2 ";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if (($_POST['suhu'] >= 15 && $_POST['suhu'] <= 35) && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] >= 8) {
        $irigasi = "2 3 3 ";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //MASIMUM-TIDAK LEMBAB
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] <= 2) {
        $irigasi = "3 1 1 ";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] <= 60 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "3 1 2 ";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] <= 60 && $_POST['tinggiair'] >= 8) {
        $irigasi = "3 1 3 ";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //MAKSIMUM-SANGAT SESUAI
    if ($_POST['suhu'] >= 30 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] <= 2) {
        $irigasi = "3 2 1";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] >= 30 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "3 2 2 ";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] >= 30 && ($_POST['kelembapan'] >= 50 && $_POST['kelembapan'] <= 80) && $_POST['tinggiair'] >= 8) {
        $irigasi = "3 2 3 ";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    //MAKSIMUM-LEMBAB
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2) {
        $irigasi = "3 3 1 ";
        nilaifuzzybanyak($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] <= 2 && ($_POST['tinggiair'] >= 2 && $_POST['tinggiair'] <= 8)) {
        $irigasi = "3 3 2 ";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    if ($_POST['suhu'] >= 30 && $_POST['kelembapan'] >= 80 && $_POST['tinggiair'] >= 8) {
        $irigasi = "3 3 3 ";
        nilaifuzzysedikit($_POST['suhu'], $_POST['kelembapan'], $_POST['tinggiair']);
    }
    echo "<br>";
    echo $irigasi;
}

?>
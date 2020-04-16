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
                <td><input type="number" name="tinggiair"> cm</td>
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
$nilaikelembapantidaksesuai = 0;
$nilaikelembapansesuai = 0;
$nilaikelembapansangatsesuai = 0;
if (isset($_POST["submit"])) {
    //tidak sesuai awal
    if ($_POST['suhu'] <= 50) {
        $nilaikelembapantidaksesuai = 1;
    } else {
        if ($_POST['suhu'] < 60) {
            $nilaikelembapantidaksesuai = (60 - $_POST['suhu']) / 10;
        } else {
            $nilaikelembapantidaksesuai = 0;
        }
    }
    //sangat sesuai
    if ($_POST['suhu'] >= 50 && $_POST['suhu'] <= 80) {
        if ($_POST['suhu'] >= 60 && $_POST['suhu'] <= 70) {
            $nilaikelembapansangatsesuai = 1;
        } else {
            if ($_POST['suhu'] >= 50 && $_POST['suhu'] < 60) {
                $nilaikelembapansangatsesuai = ($_POST['suhu'] - 50) / 10;
            } else {
                if ($_POST['suhu'] > 70 && $_POST['suhu'] < 80) {
                    $nilaikelembapansangatsesuai = (80 - $_POST['suhu']) / 10;
                } else {
                    $nilaikelembapansangatsesuai = 0;
                }
            }
        }
    }
    //sesuai
    if ($_POST['suhu'] <= 70 || $_POST['suhu'] >= 85) {
        $nilaikelembapansesuai = 0;
    } else {
        if ($_POST['suhu'] > 70 && $_POST['suhu'] < 80) {
            $nilaikelembapansesuai = ($_POST['suhu'] - 70) / 10;
        } else {
            if ($_POST['suhu'] >= 80 && $_POST['suhu'] < 85) {
                $nilaikelembapansesuai = (85 - $_POST['suhu']) / 5;
            }
        }
    }
    //tidak sesuai akhir
    if ($_POST['suhu'] >= 85) {
        $nilaikelembapantidaksesuai = 1;
    } else {
        if ($_POST['suhu'] >= 83 && $_POST['suhu'] < 85) {
            $nilaikelembapantidaksesuai = ($_POST['suhu'] - 83) / 2;
        } else {
            $nilaikelembapantidaksesuai = 0;
        }
    }
    echo "<br>";
    echo "Nilai Kelembapan Tidak Sesuai = $nilaikelembapantidaksesuai";
    echo "<br>";
    echo "Nilai Kelembapan Sesuai = $nilaikelembapansesuai";
    echo "<br>";
    echo "Nilai Kelembapan Sangat Sesuai = $nilaikelembapansangatsesuai";
}
?>
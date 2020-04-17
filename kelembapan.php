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
                <td>Kelembapan</td>
                <td> : </td>
                <td><input type="number" name="kelembapan" placeholder="Masukkan 0-100" required> %</td>
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
if (isset($_POST["submit"])) {
    echo "<h2>Solusi</h2>";
    echo "Kelembapan : " . $_POST['kelembapan'];
    echo "<br>";
    echo "<br>";
}
//GRAFIK KELEMBAPAN
$nilaikelembapantidaksesuai = 0;
$nilaikelembapansesuai = 0;
$nilaikelembapansangatsesuai = 0;
if (isset($_POST["submit"])) {
    //tidak sesuai awal
    if ($_POST['kelembapan'] <= 50) {
        $nilaikelembapantidaksesuai = 1;
    } else {
        if ($_POST['kelembapan'] < 60) {
            $nilaikelembapantidaksesuai = (60 - $_POST['kelembapan']) / 10;
        } else {
            $nilaikelembapantidaksesuai = 0;
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
    //sesuai
    if ($_POST['kelembapan'] <= 70 || $_POST['kelembapan'] >= 85) {
        $nilaikelembapansesuai = 0;
    } else {
        if ($_POST['kelembapan'] > 70 && $_POST['kelembapan'] < 80) {
            $nilaikelembapansesuai = ($_POST['kelembapan'] - 70) / 10;
        } else {
            if ($_POST['kelembapan'] >= 80 && $_POST['kelembapan'] < 85) {
                $nilaikelembapansesuai = (85 - $_POST['kelembapan']) / 5;
            }
        }
    }
    //tidak sesuai akhir
    if ($_POST['kelembapan'] >= 85) {
        $nilaikelembapantidaksesuai = 1;
    } else {
        if ($_POST['kelembapan'] >= 83 && $_POST['kelembapan'] < 85) {
            $nilaikelembapantidaksesuai = ($_POST['kelembapan'] - 83) / 2;
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
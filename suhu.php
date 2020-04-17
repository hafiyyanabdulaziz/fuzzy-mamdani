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
?>
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
                <td><input type="number" step=0.01 name="suhu" placeholder="Masukkan 0-100" value="<?php if (isset($_POST["submit"])) echo $_POST["suhu"] ?>" required> Derajat Selsius</td>
            </tr>
            <tr>
                <td>Kelembapan</td>
                <td> : </td>
                <td><input type="number" step=0.01 name="kelembapan" placeholder="Masukkan 0-100" value="<?php if (isset($_POST["submit"])) echo $_POST["kelembapan"] ?>" required> %</td>
            </tr>
            <tr>
                <td>Tinggi Air</td>
                <td>: </td>
                <td><input type="number" step=0.01 name="tinggiair" placeholder="Masukkan 0-15" value="<?php if (isset($_POST["submit"])) echo $_POST["tinggiair"] ?>" required> cm</td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
include "rules.php";
include "grafik.php";
include "defuzzifikasi.php";
if (isset($_POST["submit"])) {
    //menampilkannilaiinput($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
    //menghitungnilaigrafik($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
    //rules($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
    defuzzifikasi($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
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
function nilaifuzzybanyak($suhu, $kelembapan, $tinggiair)
{
    $arrayfuzzybanyak = array();
    $arrayfuzzybanyak[] = min($suhu, $kelembapan, $tinggiair);
    echo "<br>";
    echo "Nilai Fuzzy Banyak: ";
    echo max($arrayfuzzybanyak);
    return max($arrayfuzzybanyak);
}
function nilaifuzzysedikit($suhu, $kelembapan, $tinggiair)
{
    $arrayfuzzysedikit = array();
    $arrayfuzzysedikit[] = min($suhu, $kelembapan, $tinggiair);
    echo "<br>";
    echo "Nilai Fuzzy Sedikit: ";
    echo max($arrayfuzzysedikit);
    return max($arrayfuzzysedikit);
}

?>
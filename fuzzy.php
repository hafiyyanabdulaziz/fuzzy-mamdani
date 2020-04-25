<?php include_once('_header.php'); ?>

<div class="box">
    <h1>Perhitungan Fuzzy</h1>
    <p>Menghitung debit irigasi tanaman padi<br><br><br></p>
    <form method="post" action="">
        <div class="form-group row">
            <label class="col-sm-2">Suhu</label>
            <div class="col-sm-10">
                <input type="number" name="suhu" step=0.01 class="form-control" placeholder="Masukkan Suhu 1-100 °C" value="<?php if (isset($_POST["submit"])) echo $_POST["suhu"] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Kelembapan</label>
            <div class="col-sm-10">
                <input type="number" name="kelembapan" step=0.01 class="form-control" placeholder="Masukkan Kelembapan 1-100 %" value="<?php if (isset($_POST["submit"])) echo $_POST["kelembapan"] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Tinggi Air</label>
            <div class="col-sm-10">
                <input type="number" name="tinggiair" step=0.01 class="form-control" placeholder="Masukkan Tinggi Air 1-15 cm" value="<?php if (isset($_POST["submit"])) echo $_POST["tinggiair"] ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<?php
$nilaiy = 0;
include "fuzzy/rules.php";
include "fuzzy/grafik.php";
include "fuzzy/defuzzifikasi.php";
include "fuzzy/nilaifuzzy.php";
include "_fuzzy.php";

if (isset($_POST["submit"])) {
    //echo "Hasilnya = " . defuzzifikasi($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
    //echo "Untuk mendapatkan hasil padi yang maksimal, debit irigasi harus " . $nilaiy;
?>

    <div class="card card-body">
        <?php
        //grafik suhu
        grafikfungsikeanggotaansuhu();
        nilaigrafiksuhu($_POST["suhu"]);
        //grafik kelembapan
        grafikfungsikeanggotaankelembapan();
        nilaigrafikkelembapan($_POST["kelembapan"]);
        //grafik tinggi air
        grafikfungsikeanggotaantinggiair();
        nilaigrafiktinggiair($_POST["tinggiair"]);
        //output
        grafikoutput();
        gambarrules();
        hasilfuzzifikasi($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
        inferensi($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);

        //menampilkannilaiinput($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
        //menghitungnilaigrafik($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
        //rules($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
        //defuzzifikasi($_POST["suhu"], $_POST["kelembapan"], $_POST["tinggiair"]);
        ?>
    </div>

<?php
    //echo "Untuk mendapatkan hasil padi yang maksimal, debit irigasi harus " . $nilaiy;
}

include_once('_foother.php');
?>
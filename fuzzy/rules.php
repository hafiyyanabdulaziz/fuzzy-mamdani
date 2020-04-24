<?php
function rules($suhu, $kelembapan, $tinggiair)
{
    //MINIMUM-TIDAK LEMBAB
    if ($suhu <= 15 && $kelembapan <= 60 && $tinggiair <= 2) {
        echo "Rules 1, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan <= 60 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 2, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan <= 60 && $tinggiair >= 8) {
        echo "Rules 3, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MINIMUM-SANGAT SESUAI
    if ($suhu <= 15 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair <= 2) {
        echo "Rules, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhuminimum($suhu), sangatsesuai($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu <= 15 && ($kelembapan >= 50 && $kelembapan <= 80) && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 5, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuminimum($suhu), sangatsesuai($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu <= 15 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair >= 8) {
        echo "Rules 6, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuminimum($suhu), sangatsesuai($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MINIMUM-LEMBAB
    if ($suhu <= 15 && $kelembapan >= 80 && $tinggiair <= 2) {
        echo "Rules 7, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhuminimum($suhu), lembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan >= 80 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 8, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuminimum($suhu), lembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan >= 80 && $tinggiair >= 8) {
        echo "Rules 9, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuminimum($suhu), lembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //OPTIMAL-TIDAK LEMBAB
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan <= 60 && $tinggiair <= 2) {
        echo "Rules 10, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhuoptimal($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan <= 60 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 11, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuoptimal($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan <= 60 && $tinggiair >= 8) {
        echo "Rules 12, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuoptimal($suhu), tidaklembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //OPTIMAL-SANGAT SESUAI
    if (($suhu >= 15 && $suhu <= 35) && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair <= 2) {
        echo "Rules 13, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhuoptimal($suhu), sangatsesuai($kelembapan), tinggiairkering($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && ($kelembapan >= 50 && $kelembapan <= 80) && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 14, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuoptimal($suhu), sangatsesuai($kelembapan), tinggiairideal($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair >= 8) {
        echo "Rules 15, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuoptimal($suhu), sangatsesuai($kelembapan), tinggiairbanjir($tinggiair));
    }
    //OPTIMAL-LEMBAB
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan >= 80 && $tinggiair <= 2) {
        echo "Rules 16, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhuoptimal($suhu), lembab($kelembapan), tinggiairkering($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan >= 80 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 17, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuoptimal($suhu), lembab($kelembapan), tinggiairideal($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan >= 80 && $tinggiair >= 8) {
        echo "Rules 18, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhuoptimal($suhu), lembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MASIMUM-TIDAK LEMBAB
    if ($suhu >= 30 && $kelembapan <= 60 && $tinggiair <= 2) {
        echo "Rules 19, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhumaksimal($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan <= 60 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 20, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhumaksimal($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan <= 60 && $tinggiair >= 8) {
        echo "Rules 21, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhumaksimal($suhu), tidaklembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MAKSIMUM-SANGAT SESUAI
    if ($suhu >= 30 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair <= 2) {
        echo "Rules 22, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhumaksimal($suhu), sangatsesuai($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu >= 30 && ($kelembapan >= 50 && $kelembapan <= 80) && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 23, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhumaksimal($suhu), sangatsesuai($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu >= 30 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair >= 8) {
        echo "Rules 24, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhumaksimal($suhu), sangatsesuai($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MAKSIMUM-LEMBAB
    if ($suhu >= 30 && $kelembapan >= 80 && $tinggiair <= 2) {
        echo "Rules 25, Debit Irigasi = Banyak(" . nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair)) . ") <br>";
        //nilaifuzzybanyak(suhumaksimal($suhu), lembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan >= 80 && $tinggiair <= 2 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        echo "Rules 26, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhumaksimal($suhu), lembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan >= 80 && $tinggiair >= 8) {
        echo "Rules 27, Debit Irigasi = Sedikit(" . nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair)) . ") <br>";
        //nilaifuzzysedikit(suhumaksimal($suhu), lembab($kelembapan), tinggiairbanjir($tinggiair));
    }
}

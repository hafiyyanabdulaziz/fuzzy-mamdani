<?php
function rules($suhu, $kelembapan, $tinggiair)
{
    //MINIMUM-TIDAK LEMBAB
    if ($suhu <= 15 && $kelembapan <= 60 && $tinggiair <= 2) {
        $irigasi = "1 1 1";
        nilaifuzzybanyak(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan <= 60 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "1 1 2";
        nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan <= 60 && $tinggiair >= 8) {
        $irigasi = "1 1 3";
        nilaifuzzysedikit(suhuminimum($suhu), tidaklembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MINIMUM-SANGAT SESUAI
    if ($suhu <= 15 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair <= 2) {
        $irigasi = "1 2 1";
        nilaifuzzybanyak(suhuminimum($suhu), sangatsesuai($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu <= 15 && ($kelembapan >= 50 && $kelembapan <= 80) && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "1 2 2";
        nilaifuzzysedikit(suhuminimum($suhu), sangatsesuai($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu <= 15 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair >= 8) {
        $irigasi = "1 2 3";
        nilaifuzzysedikit(suhuminimum($suhu), sangatsesuai($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MINIMUM-LEMBAB
    if ($suhu <= 15 && $kelembapan >= 80 && $tinggiair <= 2) {
        $irigasi = "1 3 1";
        nilaifuzzybanyak(suhuminimum($suhu), lembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan >= 80 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "1 3 2";
        nilaifuzzysedikit(suhuminimum($suhu), lembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu <= 15 && $kelembapan >= 80 && $tinggiair >= 8) {
        $irigasi = "1 3 3";
        nilaifuzzysedikit(suhuminimum($suhu), lembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //OPTIMAL-TIDAK LEMBAB
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan <= 60 && $tinggiair <= 2) {
        $irigasi = "2 1 1";
        nilaifuzzybanyak(suhuoptimal($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan <= 60 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "2 1 2";
        nilaifuzzysedikit(suhuoptimal($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan <= 60 && $tinggiair >= 8) {
        $irigasi = "2 1 3";
        nilaifuzzysedikit(suhuoptimal($suhu), tidaklembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //OPTIMAL-SANGAT SESUAI
    if (($suhu >= 15 && $suhu <= 35) && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair <= 2) {
        $irigasi = "2 2 1";
        nilaifuzzybanyak(suhuoptimal($suhu), sangatsesuai($kelembapan), tinggiairkering($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && ($kelembapan >= 50 && $kelembapan <= 80) && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "2 2 2";
        nilaifuzzysedikit(suhuoptimal($suhu), sangatsesuai($kelembapan), tinggiairideal($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair >= 8) {
        $irigasi = "2 2 3 ";
        nilaifuzzysedikit(suhuoptimal($suhu), sangatsesuai($kelembapan), tinggiairbanjir($tinggiair));
    }
    //OPTIMAL-LEMBAB
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan >= 80 && $tinggiair <= 2) {
        $irigasi = "2 3 1 ";
        nilaifuzzybanyak(suhuoptimal($suhu), lembab($kelembapan), tinggiairkering($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan >= 80 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "2 3 2 ";
        nilaifuzzysedikit(suhuoptimal($suhu), lembab($kelembapan), tinggiairideal($tinggiair));
    }
    if (($suhu >= 15 && $suhu <= 35) && $kelembapan >= 80 && $tinggiair >= 8) {
        $irigasi = "2 3 3 ";
        nilaifuzzysedikit(suhuoptimal($suhu), lembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MASIMUM-TIDAK LEMBAB
    if ($suhu >= 30 && $kelembapan <= 60 && $tinggiair <= 2) {
        $irigasi = "3 1 1 ";
        nilaifuzzybanyak(suhumaksimal($suhu), tidaklembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan <= 60 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "3 1 2 ";
        nilaifuzzybanyak(suhumaksimal($suhu), tidaklembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan <= 60 && $tinggiair >= 8) {
        $irigasi = "3 1 3 ";
        nilaifuzzysedikit(suhumaksimal($suhu), tidaklembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MAKSIMUM-SANGAT SESUAI
    if ($suhu >= 30 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair <= 2) {
        $irigasi = "3 2 1";
        nilaifuzzybanyak(suhumaksimal($suhu), sangatsesuai($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu >= 30 && ($kelembapan >= 50 && $kelembapan <= 80) && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "3 2 2 ";
        nilaifuzzybanyak(suhumaksimal($suhu), sangatsesuai($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu >= 30 && ($kelembapan >= 50 && $kelembapan <= 80) && $tinggiair >= 8) {
        $irigasi = "3 2 3 ";
        nilaifuzzysedikit(suhumaksimal($suhu), sangatsesuai($kelembapan), tinggiairbanjir($tinggiair));
    }
    //MAKSIMUM-LEMBAB
    if ($suhu >= 30 && $kelembapan >= 80 && $tinggiair <= 2) {
        $irigasi = "3 3 1 ";
        nilaifuzzybanyak(suhumaksimal($suhu), lembab($kelembapan), tinggiairkering($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan >= 80 && $tinggiair <= 2 && ($tinggiair >= 2 && $tinggiair <= 8)) {
        $irigasi = "3 3 2 ";
        nilaifuzzysedikit(suhumaksimal($suhu), lembab($kelembapan), tinggiairideal($tinggiair));
    }
    if ($suhu >= 30 && $kelembapan >= 80 && $tinggiair >= 8) {
        $irigasi = "3 3 3 ";
        nilaifuzzysedikit(suhumaksimal($suhu), lembab($kelembapan), tinggiairbanjir($tinggiair));
    }
    echo "<br>";
    echo $irigasi;
}

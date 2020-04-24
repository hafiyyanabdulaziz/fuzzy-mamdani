<?php
function menghitungnilaigrafik($suhu, $kelembapan, $tinggiair)
{
    grafiksuhu($suhu);
    grafikkelembapan($kelembapan);
    grafiktinggiair($tinggiair);
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

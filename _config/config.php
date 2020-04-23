<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

$con = mysqli_connect('localhost', 'root', '', 'rumahsakit');
if(mysqli_connect_errno()){
    echo mysqli_connect_errno();
}

function base_url($url = null){
    $base_url = "http://hafihospital.com";
    if ($url != null) {
        return $base_url . "/" . $url;
    }else {
        return $base_url;
    }
}
?>
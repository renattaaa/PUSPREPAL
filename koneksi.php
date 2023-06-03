<?php 
$host ="localhost";
$user ="root";
$pass = "";
$db   = "pusprepal";

$koneksi = mysqli_connect($host, $user, $pass);

if($koneksi){
    $buka = mysqli_select_db($koneksi, $db);

    if(!$buka){
        echo "database tidak terhubung";
    }
} else {
    echo "mysqli tidak terhubung";
}

?>
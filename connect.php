<?php
#mengambil database
$databaseHost = "localhost";
$databaseName = "ta";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if(!$mysqli){
    die("Koneksi gagal : " .mysqli_connect_error());
   }
   
?>
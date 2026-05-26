<?php

$host = "localhost";
$user = "dev_user";
$password = "tso*25";
$database = "truper_equipo13";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Error de conexión");
}

?>


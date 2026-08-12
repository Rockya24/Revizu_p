<?php
$conn= mysqli_connect("127.0.0.1","root","","revizup_db",3306);
if(!$conn){
    die("Error de connexion: "  . mysqli_connect_error());
}
?>
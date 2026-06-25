<?php
$conn= mysqli_connect("127.0.0.1","root","","revizup_db",3307);
if(!$conn){
    die("Erreyur de connexion: "  . mysqli_connect_error());
}
?>
<?php
function connect(){
 $host="localhost";
 $username="id301297_3coders";
 $pass="ManitBhopal@9";
 $db="id301297_student";
 $conn = new mysqli($host, $username, $pass,$db) or die("Connect failed: %s\n". $conn -> error);
 return $conn;
}

?>
<?php
$db_host="localhost";
$db_username="root";
$db_password="sciencepwd";
$db_name="dbscikmitl";
$mysqli = new mysqli($db_host,$db_username,$db_password,$db_name);
if ($mysqli->connect_error) {
    echo "Connect Database Failed",$mysqli->connect_error;
}else{
    echo "Connect Database Success";
}
$mysqli->query("SET NAMES UTF8");

?>
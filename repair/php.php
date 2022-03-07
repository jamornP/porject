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

function datethai($date){
    $da=explode("-",$date);

    $d=$da[2];
    $m=$da[1];
    $y=$da[0];
    $month=month($date);    
    $data =intval($d)." ".$month." ".($y+543);
    return  $data;

}
function month($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];
    switch ($m){
        case "01":
            $month="ม.ค.";
            break;
        case "02":
            $month="ก.พ.";
            break;
        case "03":
            $month="มี.ค.";
            break;
        case "04":
            $month="เม.ย.";
            break;
        case "05":
            $month="พ.ค.";
            break;
        case "06":
            $month="มิ.ย.";
            break;
        case "07":
            $month="ก.ค.";
            break;
        case "08":
            $month="ส.ค.";
            break;
        case "09":
            $month="ก.ย.";
            break;
        case "10":
            $month="ต.ค.";
            break;
        case "11":
            $month="พ.ย.";
            break;
        case "12":
            $month="ธ.ค.";
            break;
        
    }
    return $month;
}
function day($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];    
    return  intval($d);

}
function year($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];    
    return  $y+543;

}
?>
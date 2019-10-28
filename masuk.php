<?php
	$host="localhost";
	$user="userta";
	$pass="myprofile17";
	$dbname="tugasakhir";

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}

$handle = fopen('php://input', 'r');
$jsonInput = fgets($handle);
$params = json_decode($jsonInput, true);

$ketinggianair = isset($params['ketinggianair'])?$params['ketinggianair']:'';
$kosong = isset($params['nodata'])?$params['nodata']:'';

date_default_timezone_set("Asia/Jakarta");
$tanggal = date('Y-m-d');
$waktu = date('h:i:s');

if($ketinggianair !=''){
	$sql = "INSERT INTO data SET ketinggianair='".$ketinggianair."', tanggal='".$tanggal."', waktu='".$waktu."'";
	if(mysqli_query($conn, $sql)) {
		} else {
			echo "Error: " . $sql . "<br>" . mysql_error($conn);
		}
	}
else{
		echo $kosong;
	}
?>

<?php
include("../connect/access_db.php");

$id_hobby = $_POST['id_hobby'];
$first_hobby = $_POST['first_hobby'];
$second_hobby = $_POST['second_hobby'];
$third_hobby = $_POST['third_hobby'];
$fourth_hobby = $_POST['fourth_hobby'];
$fifth_hobby = $_POST['fifth_hobby'];

if(isset($_POST['edit'])){

	$sql = "UPDATE hobby SET first_hobby='$first_hobby', second_hobby='$second_hobby', third_hobby='$third_hobby', fourth_hobby='$fourth_hobby', fifth_hobby='$fifth_hobby' WHERE id_hobby ='$id_hobby' ";
	
	$rs1 = mysql_query($sql);
	if ($rs1 == false) {
		echo "<script> alert('Error al Actualizar los Datos de la tabla Alumno');</script>";
	}else{
		header("refresh:0; url=../section/index.php");
	}
}

?>






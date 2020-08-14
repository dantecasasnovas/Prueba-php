<?php
if (empty($_POST['n1']) || empty($_POST['n2'])) {
    echo "<script>alert('Please complete the cell to continue');javascript:history.back();</SCRIPT>";
    } else {

echo"<center>";

echo"<br>";
echo"<br>";
echo"<br>";

if(isset($_POST['suma'])){
$a=$_POST['n1'];
$b=$_POST['n2'];
$c=$a+$b;

echo"The result of the operation is: $c";

}if(isset($_POST['resta'])){
$a=$_POST['n1'];
$b=$_POST['n2'];
$c=$a-$b;

echo"The result of the operation is: $c";

}if(isset($_POST['multiplicacion'])){
$a=$_POST['n1'];
$b=$_POST['n2'];
$c=$a*$b;

echo"The result of the operation is: $c";

}if(isset($_POST['division'])){
$a=$_POST['n1'];
$b=$_POST['n2'];
$c=$a/$b;

echo"The result of the operation is: $c";

}if(isset($_POST['modulo'])){
$a=$_POST['n1'];
$b=$_POST['n2'];
$c=$a%$b;

echo"The result of the operation is: $c";

}

echo"<br>";
echo"<br>";
echo"<br>";

echo"<a href='javascript:window.history.go(-1);'>Return</a>";
}

echo"</center>";
?>
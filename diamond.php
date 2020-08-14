<?php
if (isset($_POST['send'])) {

$n1 = $_POST['n'];

if(empty($_POST['n'])){
	echo "<script>alert('Please add a Number so you can see the result');javascript:history.back();</script>";
}else{

echo "<center>";
	echo "<br>";

	for ($b=1;$b<=$n1;$b++)
	{for ($a=1;$a<=$b;$a++)
	{echo "*";}
	echo "<br>";
	}
	
	for ($b=2;$b<=$n1;$b++)
	{for ($a=$n1;$a>=$b;$a--)
	{echo "*";}
	echo "<br>";
	}
	
	echo "<br>";

echo"<a href='javascript:window.history.go(-1);'>Return</a>";
	
echo "</center>";

}
}
?>
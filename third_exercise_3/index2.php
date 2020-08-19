<?php
/*
	// Obtener cada linea en un array:
	$aLineas = file("datos.txt");

	echo "<p>CONTENIDO DEL ARCHIVO</p>";
	echo "<p>=====================</p>";

	// Mostrar el contenido del archivo:
	foreach( $aLineas as $linea )
		echo $linea."<br/ >";

	echo "<p>Borrando la tercera linea...</p>";

	// Borrar el tercer elemento del array (la tercera linea):
	array_splice($aLineas,1);

	// Abrir el archivo:
	$archivo = fopen("datos.txt", "w+b");

	// Guardar los cambios en el archivo:
	foreach( $aLineas as $linea )
		fwrite($archivo, $linea);
	
	echo "<p>CONTENIDO DEL ARCHIVO</p>";
	echo "<p>=====================</p>";

	// Mostrar el contenido del archivo:
	foreach( $aLineas as $linea )
		echo $linea."<br/ >";

	fclose($archivo);


------------------------------------------------------------------*/


if(isset($_POST['submit'])){

$open = fopen("datos.txt","w+"); 
$text = $_POST['update']; 
fwrite($open, $text); 
fclose($open); 
echo "<p>El Contenido se Actualizo!</p>";  
$file = file("datos.txt");
foreach($file as $text) { 
echo $text."<br />";  
} 
}else{ 
$file = file("datos.txt"); 
echo "<form action='".$_SERVER['PHP_SELF'] ."' method='post'>"; 
echo "<br><textarea name='update' style='height:250px'>"; 
foreach($file as $text) { 
echo $text; 
}  
echo "</textarea><br>"; 
echo "<input name='submit' type='submit' value='Update' />\n 
</form>"; 
} 
?>
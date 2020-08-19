<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center>

<br>
<br>
<br>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <table>
        <tr>
            <td><h2 align="center">Search a archive format .txt for edit</h2></td>
        </tr>
        <tr>
            <td> <input type="file" name="archive" accept=".txt"></td>
            <td> <button type="submit" name="submit">Send</button></td>
        </tr>
    </table>

<br>
<br>
<br>

<?php
if(isset($_POST['submit'])){

    if(empty($_POST['archive'])){
    echo"<h3>No se a seleccionado ningún archivo con formato .txt</h3>";
}else{
    $file = $_POST['archive'];
    $fp = fopen($file, "r+");
    $texto = $_POST['update'] = true;
    fwrite($fp, $texto);
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" metrod='POST'>
    <p><textarea name='update'><?php echo"$fp";?></textarea></p>
    <button type='submit'>Editar</button>
</form>

<?php
fclose($fp);
    }
}
?>

</center>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <h1>Welcome to the system of the Calculator</h1>
    <h3>Add a number for view the result of the arithmetic operation </h3>

<br>
<br>

<form action="calcular.php" method="POST">
    <table>
        <tr>
            <td><input type="number" name="n1" placeholder="Add a Number"></td>
            <td><input type="number" name="n2" placeholder="Add a Number"></td>
        </tr>
    </table>

<br>
<br>

    <table>
        <tr>
            <td><button type="submit" name="suma">Suma</button></td>
            <td><button type="submit" name="resta">Resta</button></td>
            <td><button type="submit" name="multiplicacion">Multiplicación</button></td>
            <td><button type="submit" name="division">División</button></td>
            <td><button type="submit" name="modulo">Modulo</button></td>
        </tr>
    </table>
</form>

</center>

</body>
</html>
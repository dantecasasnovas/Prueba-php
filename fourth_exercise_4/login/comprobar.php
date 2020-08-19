<?php
session_start();
include('..\connect/access_db.php');
if (isset($_POST['enviar'])) {
    if (empty($_POST['cedula']) || empty($_POST['password'])) {
        echo "<SCRIPT>alert('La cedula o la contraseña no han sido ingresados');javascript:history.back();</SCRIPT>";
    } else {

        $cedula = $_POST['cedula'];
        $password = $_POST['password'];
        $query = mysql_query("SELECT * FROM loggin a inner join profile b WHERE b.cedula_perfil='".$_POST['cedula']."'");
        while ($row = mysql_fetch_array($query)){

        if (password_verify($password, $row['clave_encrypted'])) {

            $_SESSION['id_loggin'] = $row['id_loggin'];
            $_SESSION['cedula_perfil'] = $row["cedula_perfil"];
            
            if ($_SESSION['cedula_perfil'] == $_SESSION["cedula_perfil"]) {
                header("Location: ../section/index.php");
            }
        } else {
            echo "<SCRIPT>alert('La cedula o la clave no son correctas');javascript:history.back();</SCRIPT>";

               }
            }
    }
}else {
            header("Location: ../index.php");
        }

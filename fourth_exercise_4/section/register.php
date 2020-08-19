<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="..\style/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Page | Register</title>
    <script>
        function validaNumericos(event) {
            if (event.charCode >= 48 && event.charCode <= 57) {
                return true;
            }
            return false;
        }
    </script>
</head>

<body style="background-image: url('../img/bg.png');">

    <?php
    include("..\connect/access_db.php");
    if (isset($_POST['enviar'])) {

        $sin_espacios = count_Chars($_POST['cedula'], 1);
        if (!empty($sin_espacios[32])) {
            echo "<SCRIPT>alert('El campo usuario no debe contener espacios en blanco');javascript:history.back();</SCRIPT>";
        } elseif (empty($_POST['usuario'])) {
            echo "<SCRIPT>alert('Debes ingresar un nombre para el usuario');javascript:history.back();</SCRIPT>";
        } elseif (empty($_POST['cedula'])) {
            echo "<SCRIPT>alert('No has ingresado una cédula');javascript:history.back();</SCRIPT>";
        } elseif (empty($_POST['telefono'])) {
            echo "<SCRIPT>alert('No has ingresado un número de teléfono');javascript:history.back();</SCRIPT>";
        } elseif (empty($_POST['correo'])) {
            echo "<SCRIPT>alert('No has ingresado un correo');javascript:history.back();</SCRIPT>";
        } elseif (empty($_POST['clave'])) {
            echo "<SCRIPT>alert('No has ingresado contraseña');javascript:history.back();</SCRIPT>";
        } elseif ($_POST['clave'] != $_POST['clave_Conf']) {
            echo "<SCRIPT>alert('Las contraseñas ingresadas no coinciden');javascript:history.back();</SCRIPT>";
        } else {

            $cedula = $_POST['cedula'];
            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $clave_encrypted = password_hash($clave, PASSWORD_DEFAULT);

            $sql1 = mysql_query("SELECT cedula_perfil FROM profile WHERE cedula_perfil='" . $cedula . "' or usuario_perfil='" . $usuario . "' or correo_perfil='" . $correo . "' ");
            if (mysql_num_rows($sql1) > 0) {
                echo "<SCRIPT>alert('¡¡ Error !! los datos ya han sido degistrados anteriormente');javascript:history.back();</SCRIPT>";
            } else {

                $mysqli->query("INSERT INTO loggin (cedula, clave_encrypted) VALUES ('" . $cedula . "', '" . $clave_encrypted . "')");

                $usuario_perfil = $_POST['usuario'];
                $cedula_perfil = $_POST['cedula'];
                $telefono_perfil = $_POST['telefono'];
                $correo_perfil = $_POST['correo'];

                $mysqli->query("INSERT INTO profile (usuario_perfil, cedula_perfil, telefono_perfil, correo_perfil, id_loggin) VALUES ('" . $usuario_perfil . "', '" . $cedula_perfil . "', '" . $telefono_perfil . "', '" . $correo_perfil . "', " . $mysqli->insert_id . ")");

                $mysqli->query("INSERT INTO hobby (hobby_loggin) VALUES(" . $mysqli->insert_id . ") ");

                if ($mysqli) {
                    echo "<SCRIPT>alert('Datos ingresados correctamente');window.location.replace('../index.php');</SCRIPT>";
                } else {
                    echo "<SCRIPT>alert('ha ocurrido un error y no se registraron los datos');javascript:history.back();</SCRIPT>";
                }
            }
        }
    }
    ?>

    <div class="main-content-inner">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                    <div class="modal-header">
                        <h2 class="form-login-heading"> REGISTRO DE USUARIOS </h2>
                    </div>

                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="usuario" placeholder="Nombre del Usuario" autocomplete="off" class="form-control placeholder-no-fix" required>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-barcode"></i></span>
                            </div>
                            <input type="text" name="cedula" placeholder="Cédula de Identidad | (Ej. 12345678)" autocomplete="off" class="form-control placeholder-no-fix" onkeyup="this.value=this.value.replace(/ /g,'');" onkeypress="return validaNumericos(event)" required>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                            </div>
                            <input type="text" name="telefono" placeholder="Número de teléfono" autocomplete="off" class="form-control placeholder-no-fix" onkeyup="this.value=this.value.replace(/ /g,'');" onkeypress="return validaNumericos(event)" required>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
                            </div>
                            <input type="text" name="correo" placeholder="Correo electronico" autocomplete="off" class="form-control placeholder-no-fix" onkeyup="this.value=this.value.replace(/ /g,'');" required>
                        </div>
                    </div>

                    <div class="modal-body">
                        <hr>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="clave" placeholder="Contraseña" autocomplete="off" class="form-control placeholder-no-fix" onkeyup="this.value=this.value.replace(/ /g,'');" required>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="clave_Conf" placeholder="Confirmar Contraseña" autocomplete="off" class="form-control placeholder-no-fix" onkeyup="this.value=this.value.replace(/ /g,'');" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a type="submit" href="..\index.php" class="btn btn-info" name="enviar">Volver</a>
                        <button type="submit" class="btn btn-success" name="enviar">Registrar</button>
                        <button type="reset" class="btn btn-warning">Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="style/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
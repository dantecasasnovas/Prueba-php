<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body style="background-image: url('img/bg.png');">

<form class="form-login" action="login/comprobar.php" method="post">
<div class="container-fluid" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="form-login-heading">INGRESE SUS DATOS</h2>
            </div>

            <div class="modal-body">
                <input type="text" name="cedula" placeholder="Cédula del Usuario" autocomplete="off" class="form-control placeholder-no-fix" onkeyup="this.value=this.value.replace(/ /g,'');">
            </div>

            <div class="modal-body">
                <input type="password" name="password" placeholder="Contraseña" autocomplete="off" class="form-control placeholder-no-fix" onkeyup="this.value=this.value.replace(/ /g,'');">
            </div>

            <div class="modal-footer">
                <a type="submit" href="section/register.php" class="btn btn-primary" name="registro" value="Registrar">Registrarse</a>
                <button type="submit" class="btn btn-info" name="enviar" value="enviar">Enviar</button>
                <button type="reset" class="btn btn-warning">Borrar</button>
            </div>
        </div>
    </div>
</div>
</form>

<script src="style/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
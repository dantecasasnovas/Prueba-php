<?php
session_start();
include('../connect/access_db.php');

if (isset($_GET['clave_encrypted'])) {

    $query = mysql_query("SELECT * FROM loggin a inner join profile b WHERE b.id_loggin=a.id_loggin AND a.clave_encrypted='" . $_GET['clave_encrypted'] . "' ");
    while ($row = mysql_fetch_array($query)){

        if ($row['clave_encrypted'] == $_GET["clave_encrypted"]) {
            //header("Location: ../section/index.php");
?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="../style/css/profile.css">

                <title>Page | Edit Password</title>
            </head>

            <body style="background-image: url('../img/bg.png');">

                <center>

                    <div class="container">
                        <div class="abs-center border p-9 form">
                            <div class="modal-content col-10">
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <h3 class="form-login-heading col-6"><?php echo $row['usuario_perfil']; ?> in this page can edit your Hobbies </h3>
                                        <div class="modal-header">
                                            <div class="row justify-content-md-center">
                                                <img src="<?php echo $row['photo_perfil']; ?>" onerror="this.style.display='none'" class="rounded-circle " height="100" width="100">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Clave Anterior</span>
                                            </div>
                                            <input style="display:none" size="1" name="id_loggin" value="<?php echo $row['id_loggin']; ?>">
                                            <input style="display:none" size="1" name="clave_encrypted" value="<?php echo $row['clave_encrypted']; ?>">
                                            <input type="text" name="clave_anterior" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Nueva Clave</span>
                                            </div>
                                            <input type="text" name="new_pass" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Confirmar Clave Nueva</span>
                                            </div>
                                            <input type="text" name="re_new_pass" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                        </div>

                                        <div class="modal-body">
                                            <button name="edit" class="btn btn-success">Edit Profile</button>
                                            <a href="index.php" class="btn btn-info">Back</a>
                                        </div>
                                </form>

<?php
if(isset($_POST['edit'])){

$id_loggin = $row["id_loggin"];
$clave_encrypted = $row['clave_encrypted'];
$clave_anterior = $_POST['clave_anterior'];

if (empty($_POST['new_pass'])) {
    echo "<SCRIPT>alert('No has ingresado contraseña nueva');javascript:history.reload();</SCRIPT>";
} 
if ($_POST['new_pass'] != $_POST['re_new_pass']) {
    echo "<SCRIPT>alert('Las contraseñas ingresadas no coinciden');javascript:history.back();</SCRIPT>";
} else {
    $new_pass = $_POST['new_pass'];

        if (password_verify($clave_anterior, $row['clave_encrypted'])){
           
            $encrypted = password_hash($new_pass, PASSWORD_DEFAULT);
           // $encrypted = $_POST['encrypted'];

            $sql = mysql_query("UPDATE loggin SET clave_encrypted = '$encrypted' WHERE id_loggin = '" . $row['id_loggin'] . "' ");

            echo"Clave Veficada y Actualizada";

        }else{echo"No se ha verificado la clave";}
        }
?>


                        <?php
        }
        }
                        ?>
                            </div>
                        </div>
            </body>

            </html>

        <?php
        //header("Location: ../index.php");
    }
    }
        ?>
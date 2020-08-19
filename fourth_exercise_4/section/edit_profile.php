<?php
session_start();
include('../connect/access_db.php');

error_reporting(0);

if (isset($_GET['id_perfil'])) {

    if (isset($_GET['id_perfil'])) {

        $query = mysql_query("SELECT * FROM profile WHERE id_perfil = '" . $_GET['id_perfil'] . "' ");
        while ($row = mysql_fetch_array($query)) {
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="../style/css/profile.css">

                <title>Page | Edit Profile</title>

            </head>

            <body style="background-image: url('../img/bg.png');">

                <center>

                    <div class="container">
                        <div class="abs-center">
                            <form action="" method="post" enctype="multipart/form-data" class="border p-4 form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="form-login-heading"><?php echo $row['usuario_perfil']; ?> in this page can edit your profile </h3>
                                    </div>

                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Nombre</span>
                                            </div>
                                            <input type="text" name="usuario_perfil" value="<?php echo $row['usuario_perfil']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Cédula</span>
                                            </div>
                                            <input type="text" name="cedula_perfil" value="<?php echo $row['cedula_perfil']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Teléfono</span>
                                            </div>
                                            <input type="text" name="telefono_perfil" value="<?php echo $row['telefono_perfil']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Correo</span>
                                            </div>
                                            <input type="text" name="correo_perfil" value="<?php echo $row['correo_perfil']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="modal-body">
                                                <img src="<?php echo $row['photo_perfil']; ?>" id="blah" class="rounded-circle" height="200" width="200">
                                                <input type="file" name="photo_button" accept="image/*" class="custom-file-input" lang="es" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="custom-file">
                                            <input type="file" name="photo_button" accept="image/*" class="custom-file-input" lang="es" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <button name="edit" class="btn btn-success">Edit Profile</button>
                                        <a href="index.php" class="btn btn-info">Back</a>
                                    </div>
                            </form>

                            <?php if (isset($_POST['edit'])) {
                                $id_perfil = $row['id_perfil'];
                                $usuario_perfil = $_POST['usuario_perfil'];
                                $cedula_perfil = $_POST['cedula_perfil'];
                                $telefono_perfil = $_POST['telefono_perfil'];
                                $correo_perfil = $_POST['correo_perfil'];
                                $photo_perfil = $row['photo_perfil'];

                                $tips = 'jpg';
                                $type = array('image/jpeg' => 'jpg');
                                $id = $row['id_perfil'];

                                $photo_user = $_FILES['photo_button']['name'];
                                $ruta1 = $_FILES['photo_button']['tmp_name'];
                                $name = $id_perfil . '.' . $tips;
                                if (is_uploaded_file($ruta1)) {
                                    $destino = 'photo_edit/' . $name;
                                    copy($ruta1, $destino);
                                }

                                if ($destino != '') {
                                    $sql = mysql_query("UPDATE profile SET usuario_perfil = '$usuario_perfil', cedula_perfil = '$cedula_perfil', telefono_perfil = '$telefono_perfil', correo_perfil = '$correo_perfil', photo_perfil = '$destino'  WHERE id_perfil = '" . $row['id_perfil'] . "' ");
                                    header("refresh:0; url=#");
                                } else {
                                    $sql = mysql_query("UPDATE profile SET usuario_perfil = '$usuario_perfil', cedula_perfil = '$cedula_perfil', telefono_perfil = '$telefono_perfil', correo_perfil = '$correo_perfil' WHERE id_perfil = '" . $row['id_perfil'] . "' ");
                                    header("refresh:0; url=#");
                                }
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
    } else {
        header("Location: ../index.php");
    }
        ?>
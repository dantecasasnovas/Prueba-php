<?php
session_start();
include('../connect/access_db.php');

if (isset($_GET['id_perfil'])) {
    $query = mysql_query("SELECT * FROM profile a inner join hobby b WHERE b.hobby_loggin=a.id_perfil AND a.id_perfil='" . $_GET['id_perfil'] . "' ");
    while ($row = mysql_fetch_array($query)) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../style/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="../style/css/profile.css">

            <title>Page | Hobby</title>
        </head>

        <body style="background-image: url('../img/bg.png');">

            <center>

                <div class="container">
                    <div class="abs-center border p-9 form">
                        <div class="modal-content col-10">
                            <form action="../script/function.php" method="POST">
                                <div class="modal-header">
                                    <h3 class="form-login-heading col-6"><?php echo $row['usuario_perfil']; ?> in this page can edit your Hobbies </h3>
                                    <div class="modal-header">
                                        <div class="row justify-content-md-center">
                                            <img src="<?php echo $row['photo_perfil']; ?>" onerror="this.style.display='none'" class="rounded-circle " height="100" width="100">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <input style="display:none" size="1" name="id_hobby" value="<?php echo $row['id_hobby']; ?>">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">First Hobby</span>
                                        </div>
                                        <input type="text" name="first_hobby" value="<?php echo $row['first_hobby']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Second Hobby</span>
                                        </div>
                                        <input type="text" name="second_hobby" value="<?php echo $row['second_hobby']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Third Hobby</span>
                                        </div>
                                        <input type="text" name="third_hobby" value="<?php echo $row['third_hobby']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Fourth Hobby</span>
                                        </div>
                                        <input type="text" name="fourth_hobby" value="<?php echo $row['fourth_hobby']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Fifth Hobby</span>
                                        </div>
                                        <input type="text" name="fifth_hobby" value="<?php echo $row['fifth_hobby']; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <button name="edit" class="btn btn-info">Save your Hobbies</button>
                                    <a href="index.php" class="btn btn-danger">Back</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <center>

        </body>

        </html>

<?php
    }
} else {
    header("Location: ../section/close_session.php");
}
?>
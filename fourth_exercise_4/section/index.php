<?php
session_start();
include('../connect/access_db.php');

if (isset($_SESSION['cedula_perfil'])) {

  $query = mysql_query("SELECT * FROM loggin a inner join profile b inner join hobby c WHERE b.id_loggin=a.id_loggin AND c.hobby_loggin=b.id_perfil AND b.cedula_perfil='" . $_SESSION['cedula_perfil'] . "' ");
  while ($row = mysql_fetch_array($query)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../style/css/profile.css">

      <title>Page | Inicio</title>
    </head>

    <body style="background-image: url('../img/bg.png');">

      <center>

        <div class="container">
          <div class="abs-center">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="form-login-heading">¡Hi <?php echo $row['usuario_perfil']; ?> welcome at your profile !</h3>
              </div>

              <div class="row">
                <div class="modal-body">
                  <img src="<?php echo $row['photo_perfil']; ?>" onerror="this.style.display='none'" class="rounded-circle " height="200" width="200">
                </div>
              </div>
              <div class="modal-footer justify-content-md-center">
                <a type="submit" onclick="location.href='change_pass.php?clave_encrypted=<?php echo $row['clave_encrypted']; ?>'" class="btn btn-primary">Change of Password</a></form>
                <a type="submit" href="edit_profile.php?id_perfil=<?php echo $row['id_perfil']; ?>" class="btn btn-success">Edit Profile</a>
                <a type="submit" href="hobby.php?id_perfil=<?php echo $row['id_perfil']; ?>" class="btn btn-info"> Add New Hobby</a>
                <a type="submit" href="close_session.php" class="btn btn-danger">Sing Out</a>

                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th scope="col-2">#</th>
                      <th colspan="5">Hobbies</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td><?php echo $row["first_hobby"]; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td><?php echo $row["second_hobby"]; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td><?php echo $row["third_hobby"]; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td><?php echo $row["fourth_hobby"]; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td><?php echo $row["fifth_hobby"]; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      <?php
    }
      ?>
      </center>
      <script src="style/bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>
  <?php } else {
  header("Location: ../section/close_session.php");
} ?>
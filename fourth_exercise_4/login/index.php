<?php
    if (isset($_POST['cedula'])) {
        header("Location: ../section/index.php");
    } else {
        header("Location: ../index.php");
    }
?>
<?php
require_once('./app/Users_logic.php');
session_start();


    if (!$_GET['id']) {
        header("location:admin.php?page=dashboard");
    }
    if($_GET['id'] == $_SESSION['id']) {
        header("location:admin.php?page=dashboard");
        die;
    }
    $config = new Users_logic();
    $deleteQuery = $config->deleteUsers($_GET['id']);
    if($deleteQuery[0] == true){
        echo"
        <script>
            alert('Berhasil delete')
        </script>
        ";
    }else{
        echo"
        <script>
            alert('Gagal delete')
        </script>
        ";
    }

    header("location:admin.php?page=users");


?>
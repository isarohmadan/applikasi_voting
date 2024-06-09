<?php
require_once('./app/Logic.php');
session_start();


    if (!$_GET['id']) {
        header("location:admin.php?page=dashboard");
    }
    $config = new Logic();
    $deleteQuery = $config->deletePooling($_GET['id']);
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

    header("location:admin.php?page=pooling");


?>
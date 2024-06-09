<?php
session_start();
require_once('./../config/Conn.php');
require_once('./../Handler/Handler.php');

if(isset($_POST['expression'])){
    $Result = eval('return '.$_POST['expression'].';');
    echo($Result);
    logCalculatorOperation($_POST['expression'],$Result);
}

function logCalculatorOperation($operation_string, $result) {
    $config = new Conn();
    $connection = $config->getConnection();

    if (!$connection) {
        return customError(500, 'Failed to connect to database');
    }

    $user_id = $_SESSION['id'];
    $date = date('Y-m-d');

    $query = "INSERT INTO log_kalkulator (id_user, operasi, hasil, tanggal) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($query);

    if (!$stmt) {
        return customError(500, 'Failed to prepare SQL statement');
    }

    $stmt->bind_param("ssis", $user_id, $operation_string, $result, $date);

    if (!$stmt->execute()) {
        return customError(500, 'Failed to execute SQL statement');
    }

    return customSuccess(201, 'Operation logged successfully');
}
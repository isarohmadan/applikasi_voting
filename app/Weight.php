<?php
session_start();
require_once('./../config/Conn.php');
require_once('./../Handler/Handler.php');

if(isset($_POST)){
    $weightData = json_decode($_POST[0], true);

    $weight = $weightData['weight'];
    $WeightFrom = $weightData['WeightFrom'];
    $WeightTo = $weightData['WeightTo'];
    $convertedWeight = $weightData['convertedWeight'];

    $response = sprintf(
        '%s %s = %s %s',
        $weight,
        $WeightFrom,
        $convertedWeight,
        $WeightTo
    );

    echo $response;
    // echo ($_PO   ST['weight']. " " . $_POST['WeightFrom'] . " = " . $_POST['convertedWeight'] . '' . $_POST['WeightTo']);
    logWeightOperator($weight,$convertedWeight, $WeightFrom, $WeightTo);
}

function logWeightOperator($weight, $convertedWeight , $WeightFrom, $WeightTo) {
    $config = new Conn();
    $connection = $config->getConnection();

    if (!$connection) {
        return customError(500, 'Failed to connect to database');
    }

    $user_id = $_SESSION['id'];
    $date = date('Y-m-d');

    $query = "INSERT INTO log_berat (id_user, berat_dari, berat_ke, berat_awal , berat_akhir, tanggal) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($query);

    if (!$stmt) {
        return customError(500, 'Failed to prepare SQL statement');
    }

    $stmt->bind_param("sssiis", $user_id, $WeightFrom,$WeightTo, $weight, $convertedWeight, $date);

    if (!$stmt->execute()) {
        return customError(500, 'Failed to execute SQL statement');
    }

    return customSuccess(201, 'Operation logged successfully');
}
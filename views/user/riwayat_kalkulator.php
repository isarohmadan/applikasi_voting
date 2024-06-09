<?php

require './app/Logic.php';

$Logic = new Logic();
$riwayat_riwayat = $Logic->getRiwayatKalkulator($_SESSION['id']);




?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once('./views/user/components/header.php');?>
<body>
    <?php include_once('./views/user/components/navbar.php');?>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 container mx-auto mt-5">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">No.</th>
            <th scope="col" class="px-6 py-3">Username</th>
            <th scope="col" class="px-6 py-3">Operasi</th>
            <th scope="col" class="px-6 py-3">Hasil</th>
            <th scope="col" class="px-6 py-3">Tanggal</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($riwayat_riwayat as $riwayat){ ?>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4"><?=$no++?></td>
            <td class="px-6 py-4"><?=$riwayat["username"]?></td>
            <td class="px-6 py-4"><?=$riwayat["operasi"]?></td>
            <td class="px-6 py-4"><?=$riwayat["hasil"]?></td>
            <td class="px-6 py-4"><?=$riwayat["tanggal"]?></td>
        </tr>
    <?php } ?>
        <!-- Add more rows as needed -->
    </tbody>
</table>
</body>
</html>
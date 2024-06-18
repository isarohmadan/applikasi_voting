<?php
require_once('./app/Logic.php');
if(!isset($_GET['id'])){
    header("location:user.php?page=pooling");
}

$logic = new Logic();
$user = $logic->getPooling($_GET["id"])->fetch_assoc();
$pooling = $logic->getPemilihWherePooling($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="en">
    <!-- ngambilnya dari user -->
    <?php include_once('./views/user/components/header.php');?>
<body>
    <?php include_once('./views/user/components/navbar.php');?>
    <!-- Container -->
<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
  <!-- Header -->
  <div class="flex justify-between mb-4">
    <h2 class="text-2xl font-bold">Pooling Informasi</h2>
  </div>

  <!-- Pooling Informasi -->
  <!-- Pooling Informasi -->
  <div class="bg-white shadow-md p-4 mb-4 text-center"> 
    <!-- Nama -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2 ">Nama</h4>
      <p class="text-gray-600 text-xl"><?= $user['username'] ?></p>
    </div>
    
    <!-- Email -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Email</h4>
      <p class="text-gray-600 text-xl"><?= $user['email'] ?></p>
    </div>
    
    <!-- Kategori -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Kategori</h4>
      <p class="text-gray-600 text-xl font-bold"><?= $user['nama_kategori'] ?></p>
    </div>
        <!-- Visi -->
        <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Visi</h4>
      <p class="text-gray-600 text-sm"><?= $user['visi'] ?></p>
    </div>
    
    <!-- Misi -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Misi</h4>
      <p class="text-gray-600 text-sm"><?= $user['misi'] ?></p>
    </div>

    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Deadline</h4>
      <p class="text-gray-600 text-sm" id="deadline-<?= $user['id_pooling']?>" data-deadline="<?= $user['deadline'] ?>"></p>
    </div>
  </div>


  <!-- Peserta Pooling -->
  <div class="flex flex-wrap -mx-4">
    <!-- Card Peserta 1 -->
    <?php foreach($pooling as $pemilih): ?>
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white shadow-md p-4">
        <h4 class="text-lg font-bold"><?=$pemilih['username']?></h4>
        <p class="text-gray-600"><?= $pemilih['komentar']?></p>
      </div>
    </div>
    <?php endforeach; ?>

    </div>
<script src="./asset/js/timer.js"></script>
</body>


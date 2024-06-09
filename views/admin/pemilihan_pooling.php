<?php
require_once('./app/Users_logic.php');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $logic = new Users_logic();
    $result = $logic->inputUsers($username,  $password,$email, $role);
    if($result[0] == true){
        header('Location: ./admin.php?page=users');
    }else{
        $error = 'Failed to create user';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <!-- ngambilnya dari admin -->
    <?php include_once('./views/admin/components/header.php');?>
<body>
    <?php include_once('./views/admin/components/navbar.php');?>
    <!-- Container -->
<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
  <!-- Header -->
  <div class="flex justify-between mb-4">
    <h2 class="text-2xl font-bold">Pooling Informasi</h2>
  </div>

    <!-- Halaman Pemilihan -->

<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
  <h2 class="text-2xl font-bold mb-4">FORM PEMILIHAN</h2>

  <!-- BEM -->
  <div class="bg-white shadow-md p-4 mb-4 text-center">
    <ul class="text-lg font-bold m-5 text-3xl">BEM</ul>
    <ul class="list-none mb-4 flex justify-center gap-3">
      <li class="flex-1 mb-2">
        <div class="bg-white shadow-md p-4 w-full">
          <h4 class="text-lg font-bold mb-2 text-3xl">Made</h4>
          <p class="text-gray-600">Menjadikan BEM sebagai garda terdepan dalam menciptakan lingkungan kampus yang inklusif, inovatif, dan berdaya saing, guna membentuk mahasiswa yang berintegritas dan siap menghadapi tantangan global</p>
          <p class="text-gray-600  border-2 mt-5">Jumlah Pendukung: 12</p>
          <button class="border-2 bg-green-400 hover:bg-green-200 transition-all text-black font-bold py-2 px-4 rounded-xl mt-3">Dukung</button>
          <p class="text-gray-600  mt-5 bg-blue-300">PEMENANG USUL</p>
        </div>
      </li>
      <li class="flex-1 mb-2">
        <div class="bg-white shadow-md p-4 w-full">
          <h4 class="text-lg font-bold mb-2 text-3xl">Sitha</h4>
          <p class="text-gray-600">Mengembangkan BEM sebagai wadah aspirasi mahasiswa yang responsif, transparan, dan profesional, dengan fokus pada penguatan kolaborasi, pengembangan potensi, dan peningkatan kesejahteraan mahasiswa.</p>
          <p class="text-gray-600 border-2 mt-5">Jumlah Pendukung: 90</p>
          <button class="border-2 bg-green-400 hover:bg-green-200 transition-all text-black font-bold py-2 px-4 rounded-xl mt-3">Dukung</button>
        </div>
      </li>
    </ul>
  </div>

  <!-- Ke pantai -->
  <div class="bg-white shadow-md p-4 mb-4 text-center">
    <ul class="text-lg font-bold m-5 text-3xl">Ke Pantai Atau Ke Gunung</ul>
    <ul class="list-none mb-4 flex justify-center gap-3">
      <li class="flex-1 mb-2">
        <div class="bg-white shadow-md p-4 w-full">
          <h4 class="text-lg font-bold mb-2 text-3xl">Rendy Pangalila</h4>
          <p class="text-gray-600">Menurut saya pantai lebih seru karena banyak cewek cantik </p>
          <p class="text-gray-600 border-2 mt-5">Jumlah Pendukung: 12</p>
          <button class="border-2 bg-green-400 hover:bg-green-200 transition-all text-black font-bold py-2 px-4 rounded-xl mt-3">Dukung</button>
        </div>
      </li>
      <li class="flex-1 mb-2">
        <div class="bg-white shadow-md p-4 w-full">
          <h4 class="text-lg font-bold mb-2 text-3xl">Cellos botak</h4>
          <p class="text-gray-600">Menurut saya Gunung lebih seru karena ALAM DAN BANYAKK HANTU .</p>
          <p class="text-gray-600  border-2 mt-5">Jumlah Pendukung: 90</p>
          <button class="border-2 bg-green-400 hover:bg-green-200 transition-all text-black font-bold py-2 px-4 rounded-xl mt-3">Dukung</button>
        </div>
      </li>
    </ul>
  </div>
</body>
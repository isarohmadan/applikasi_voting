<?php
  require_once "./app/Users_logic.php";
  require_once './app/Logic.php';
  $user = new Users_logic();
  $data = $user->getAllUsers();
  $user = 0;
  foreach($data as $us){
    $user++;
  }

  $logic = new Logic();
  $data = $logic->getRiwayatKalkulator($_SESSION['id']);
  $log_kalkulator = 0;
  foreach($data as $us){
    $log_kalkulator++;
  }


  $data = $logic->getRiwayatBerat($_SESSION['id']);
  $log_berat = 0;
  foreach($data as $us){
    $log_berat++;
  }

?>

<!DOCTYPE html>
<html lang="en">
    <!-- ngambilnya dari admin -->
    <?php include_once('./views/user/components/header.php');?>
<body>
    <?php include_once('./views/user/components/navbar.php');?>
    <div class="container mx-auto p-6">
  <h1 class="text-2xl font-bold mb-6">Dashboard Anda</h1>
  <div class="grid grid-cols-2 gap-6">
    <div class="bg-white shadow-md rounded-lg p-6">
      <h2 class="text-xl font-bold mb-2">Total Riwayat Kalkulator Yang Anda Lakukan</h2>
      <p class="text-gray-600 mb-4">Total Riwayat:</p>
      <p class="text-3xl font-bold"><?=$log_kalkulator?></p>
      <div class="flex items-center mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14h-5l-1.405-1.405A2.032 2.032 0 0114 12H5a2.032 2.032 0 01-2-2V5a2.032 2.032 0 012-2h14a2.032 2.032 0 012 2v7a2.032 2.032 0 01-2 2h-5l-1.405 1.405a2.032 2.032 0 01-2.828 0l-1.405-1.405H5a2.032 2.032 0 01-2 2v7z" />
        </svg>
        <a class="text-gray-600 ml-2 text-decoration-none" href="admin.php?page=riwayat_kalkulator">View Riwayat Kalkulator</a>
      </div>
    </div>
    <div class="bg-white shadow-md rounded-lg p-6">
      <h2 class="text-xl font-bold mb-2">Total Riwayat Kalkulator Konversi Berat Yang Anda Lakukan</h2>
      <p class="text-gray-600 mb-4">Total Riwayat:</p>
      <p class="text-3xl font-bold"><?=$log_berat?></p>
      <div class="flex items-center mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14h-5l-1.405-1.405A2.032 2.032 0 0114 12H5a2.032 2.032 0 01-2-2V5a2.032 2.032 0 012-2h14a2.032 2.032 0 012 2v7a2.032 2.032 0 01-2 2h-5l-1.405 1.405a2.032 2.032 0 01-2.828 0l-1.405-1.405H5a2.032 2.032 0 01-2 2v7z" />
        </svg>
        <a class="text-gray-600 ml-2 text-decoration-none" href="admin.php?page=riwayat_berat">View Riwayat Konversi berat</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>



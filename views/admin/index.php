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
  $data = $logic->getAllCategory();
  $kategori = 0;
  foreach($data as $us){
    $kategori++;
  }


  $data = $logic->getPooling();
  $pooling = 0;
  foreach($data as $us){
    $pooling++;
  }
  $pemilih = $logic->getPooling();
  $user_pemilih= 0;
  foreach($data as $us){
    $user_pemilih++;
  }

?>

<!DOCTYPE html>
<html lang="en">
    <!-- ngambilnya dari admin -->
    <?php include_once('./views/admin/components/header.php');?>
<body>
    <?php include_once('./views/admin/components/navbar.php');?>
    <div class="container mx-auto p-6 flex justify-center flex-col">
    <h1 class="text-2xl text-center font-bold mb-6 uppercase">Dashboard</h1>
    <div class="grid grid-cols-4 gap-6">
      <div class="bg-white shadow-md rounded-lg p-6 flex-1 justify-center">
        <h2 class="text-xl font-bold mb-2">Jumlah Kategori</h2>
        <p class="text-gray-600 mb-4">Jumlah Kategori:</p>
        <p class="text-3xl font-bold"><?=$kategori?></p>
        <div class="flex items-center mt-4">
        </div>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-2">Total Pooling</h2>
        <p class="text-gray-600 mb-4">Total Pooling:</p>
        <p class="text-3xl font-bold"><?=$pooling?></p>
        <div class="flex items-center mt-4">
        </div>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-2">Total Users</h2>
        <p class="text-gray-600 mb-4">Total users:</p>
        <p class="text-3xl font-bold"><?=$user?></p>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-2">Total Pemilih</h2>
        <p class="text-gray-600 mb-4">Total Pemilih:</p>
        <p class="text-3xl font-bold"><?=$user_pemilih?></p>
      </div>
    </div>
</div>
</body>
</html>



<?php
  require_once './app/Logic.php';


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

?>

<!DOCTYPE html>
<html lang="en">
    <!-- ngambilnya dari admin -->
    <?php include_once('./views/user/components/header.php');?>
<body>
    <?php include_once('./views/user/components/navbar.php');?>
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
    </div>
</div>
</body>
</html>



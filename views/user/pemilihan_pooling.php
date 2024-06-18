<?php
require_once('./app/Logic.php');
$config = new Logic();
$categories = $config->getAllCategory();


if(isset($_POST['submit-pemilih'])){
    $comment = htmlspecialchars($_POST['comment']);
    $id_pool = htmlspecialchars($_POST['id_pool']);

    $result = $config->memilihPooling($id_pool, $comment);
    if($result[0] == 200){
        header('Location: ./user.php?page=pemilihan_pooling');
    }else{
        echo "<script>alert('{$result[1]}');</script>";
    }
}

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
    <h2 class="text-2xl font-bold">Voting Informasi</h2>
  </div>

    <!-- Halaman Pemilihan -->


    <!-- modal -->

    <!-- The modal container -->
<div class="fixed inset-0 z-50 flex justify-center items-center px-10 overflow-y-auto modal hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <!-- The modal background -->
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <!-- The modal content -->
  <div class="relative bg-white rounded-lg shadow-md p-4 max-w-md mx-auto">
    <!-- The modal header -->
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-bold" id="modal-title">Tambah Komentar</h2>
      <button class="text-gray-400 text-xl hover:text-gray-900 transition duration-300" id="close-modal" aria-label="Close modal">
        X
      </button>
    </div>

    <!-- The modal body -->
    <form class="space-y-4" method="post">
      <label class="block mb-2">
        <input type="hidden" id="id_pool" name="id_pool" xvalue="">
        <span class="text-gray-700">Komentar:</span>
        <textarea class="w-full p-2 text-sm text-gray-700 border-2" id="comment" name="comment" rows="4"></textarea>
      </label>

      <!-- The submit button -->
      <button class="bg-black hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" type="submit" name="submit-pemilih">Tambah Komentar</button>
    </form>
  </div>
</div>



<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12">
  <h2 class="text-2xl font-bold mb-4">FORM PEMILIHAN</h2>

  <?php foreach($categories as $category):?>
    <?php 
      $pooling = $config->getPoolingByCategory($category['id_category']);
      $dataWinner = [];
      ?>
  <div class="bg-white border-2 rounded-xl shadow-xl p-4 mb-4 text-center" id="category-<?= $category['id_category'] ?>">
    <ul class="text-lg font-bold m-5 text-3xl"><?= $category['nama_kategori']?></ul>
    <ul class="p-5">
    <td class="px-6 text-center py-4 whitespace-nowrap m-2">
      <div class="text-sm text-gray-900 inline p-2 rounded-xl deadline bg-green-200 uppercase font-bold" id="deadline-<?=$category['id_category']?>" data-deadline="<?= $category['deadline'] ?>" data-id="<?=$category['id_category']?>">
                          <!-- Waktu akan diperbarui oleh JavaScript -->
        </div>
        <div class="text-sm text-gray-900 inline p-2 rounded-xl bg-yellow-200 uppercase font-bold status" data-status='<?=$category['status']?>' id="status-<?=$category['id_category']?>" >
                          <!-- Waktu akan diperbarui oleh JavaScript -->
                          <?=$category['status']?>
        </div>
    </td>
    </ul>
    <div class="flex gap-6 list-none m-3 justify-center">
    <?php foreach ($pooling as $pool){ 
      $jumlahPemilih = $config->getJumlahPemilih($pool['id_pooling']); 
      ?>
    <ul class="list-none mb-4 justify-center gap-3">
      <li class="flex-1 mb-2">
        <div class="bg-white shadow-md p-4 w-full">
          <h4 class="text-lg font-bold mb-2 text-3xl"><?=$pool['username']?></h4>
          <p class="text-gray-600"><?=$pool['visi']?></p>
          <p class="text-gray-600  border-2 mt-5 px-5 py-3">Jumlah Pendukung: <?=$jumlahPemilih?></p>
          <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" id-pool=<?=$pool['id_pooling']?> class="border-2 bg-green-400 hover:bg-green-200 transition-all text-black font-bold py-2 px-4 rounded-xl mt-3 dukung">Dukung</button>
          <!-- <p class="text-gray-600  mt-5 bg-blue-300">PEMENANG USUL</p> -->
        </div>
      </li>
    </ul>
    <?php } ?>
    </div>
    
  </div>
  <?php endforeach;?>
</body>
<script src="./asset/js/pemilihan.js"></script>
</html>
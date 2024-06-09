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

  <!-- Pooling Informasi -->
  <!-- Pooling Informasi -->
  <div class="bg-white shadow-md p-4 mb-4 text-center"> 
    <!-- Nama -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2 ">Nama</h4>
      <p class="text-gray-600 text-xl">Made</p>
    </div>
    
    <!-- Email -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Email</h4>
      <p class="text-gray-600 text-xl">made@gmail.com</p>
    </div>
    
    <!-- Kategori -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Calon</h4>
      <p class="text-gray-600 text-xl font-bold">Ketua BEM</p>
    </div>
        <!-- Visi -->
        <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Visi</h4>
      <p class="text-gray-600 text-sm">Menjadi perusahaan terdepan dalam inovasi dan kualitas, memberikan kontribusi signifikan pada kemajuan teknologi dan kesejahteraan masyarakat.</p>
    </div>
    
    <!-- Misi -->
    <div class="flex flex-col justify-center mb-4">
      <h4 class="text-lg font-bold mr-2">Misi</h4>
      <p class="text-gray-600 text-sm">Inovasi Berkelanjutan: Mengembangkan produk dan layanan yang inovatif dengan mengutamakan penelitian dan pengembangan teknologi terbaru.
Kualitas Terbaik: Menyediakan produk dan layanan dengan kualitas terbaik yang memenuhi dan melampaui harapan pelanggan.
Pelanggan Utama: Membangun hubungan jangka panjang dengan pelanggan melalui pelayanan yang luar biasa dan solusi yang disesuaikan.
Karyawan yang Berkompeten: Memberikan lingkungan kerja yang mendukung pengembangan profesional dan pribadi bagi karyawan.
Tanggung Jawab Sosial: Berkontribusi pada komunitas dan lingkungan melalui praktik bisnis yang berkelanjutan dan bertanggung jawab.
Nilai Pemegang Saham: Meningkatkan nilai bagi pemegang saham melalui pertumbuhan yang berkelanjutan dan profitabilitas.</p>
    </div>
  </div>


  <!-- Peserta Pooling -->
  <div class="flex flex-wrap -mx-4">
    <!-- Card Peserta 1 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white shadow-md p-4">
        <h4 class="text-lg font-bold">Komang</h4>
        <p class="text-gray-600">Sangat Baguss!.</p>
      </div>
    </div>

    <!-- Card Peserta 2 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white shadow-md p-4">
        <h4 class="text-lg font-bold">Arya</h4>
        <p class="text-gray-600">Saya Sangat Suka Made!.</p>
      </div>
    </div>

    <!-- Card Peserta 3 -->
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white shadow-md p-4">
        <h4 class="text-lg font-bold">Made Ozzy</h4>
        <p class="text-gray-600">Kurang menurutku visi misinya.</p>
      </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white shadow-md p-4">
        <h4 class="text-lg font-bold">Peserta 3</h4>
        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-4">
      <div class="bg-white shadow-md p-4">
        <h4 class="text-lg font-bold">Peserta 3</h4>
        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
  </div>
</div>

</body>
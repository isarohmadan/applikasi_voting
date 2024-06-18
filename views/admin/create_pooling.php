<?php
require_once "./app/Logic.php";
require_once "./app/Users_logic.php";

$config = new Users_logic();
$PoolingLogic = new Logic();

$users = $config->getAllUsers();
$categories = $PoolingLogic->getAllCategory();

if(isset($_POST['submit'])){
    $user = htmlspecialchars($_POST['pengguna']);
    $visi = htmlspecialchars($_POST['visi']);
    $misi = htmlspecialchars($_POST['misi']);
    $kategori = htmlspecialchars($_POST['kategori']);

    
    $result = $PoolingLogic->createPooling($user, $visi, $misi, $kategori);
    if($result[0] == true){
        header('Location: ./admin.php?page=pooling');
    }else{
        $error = 'Failed to create pooling';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <!-- ngambilnya dari admin -->
    <?php include_once('./views/admin/components/header.php');?>
<body>
    <?php include_once('./views/admin/components/navbar.php');?>
    <main class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Membuat Voting</h1>
    <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <div class="mb-4">
            <label for="visi" class="block text-gray-700 font-bold mb-2">Visi</label>
            <input type="text" name="visi" id="visi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="misi" class="block text-gray-700 font-bold mb-2">Misi</label>
            <input type="misi" name="misi" id="misi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="kategori" class="block text-gray-700 font-bold mb-2">Kategori</label>
            <select name="kategori" id="kategori" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option disabled selected>Pilih Kategori</option>
                <?php foreach($categories as $category):?>
                    <option value="<?=$category['id_category']?>"><?= $category['nama_kategori']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-4">
        <label for="pengguna" class="block text-gray-700 font-bold mb-2">Pengguna</label>
            <select name="pengguna" id="pengguna" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option disabled selected>Pilih Orang</option>
                <?php foreach($users as $user):?>
                    <option value="<?=$user['id_user']?>"><?= $user['username']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-4">
        
        <div class="flex justify-end">
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
        </div>
    </form>
</main>

</body>
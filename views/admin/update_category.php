<?php
require_once "./app/Logic.php";
require_once "./app/Users_logic.php";

if(!isset($_GET['id'])){
    header("location:admin.php?page=pooling");
}
$Categories = new Logic();
$category = $Categories->getAllCateogries($_GET["id"]);

if ($category->num_rows > 0) {
    $category = $category->fetch_assoc();
}else{
    header("location:admin.php?page=category");
}


if(isset($_POST['submit'])){
    $nama_category = htmlspecialchars($_POST['nama_category']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $deadline = htmlspecialchars($_POST['deadline']);
    $status = htmlspecialchars($_POST['status']);
    

    $result = $Categories->updateCategory($nama_category, $deskripsi , $deadline ,$status,(int)$_GET['id']);
    if($result[0] == true){
        echo "<script>alert('{$result[1]}');</script>";
        header('Location: ./admin.php?page=kategori');
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
    <main class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Create User</h1>
    <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <div class="mb-4">
            <label for="nama_kategori" class="block text-gray-700 font-bold mb-2">Nama Kategori</label>
            <input type="text" name="nama_category" id="nama_category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?= $category['nama_kategori']?>">
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
            <textarea class="border-2 w-full p-2" name="deskripsi" id="deskripsi" cols="30" rows="10"> <?= $category['deskripsi']?></textarea>
        </div>
        <div class="mb-4">
            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">Deadline:</label>
            <input type="datetime-local" id="deadline" name="deadline" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm scrollable" value="<?= $category['deadline']?>">
        </div>
        <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option disabled selected>Pilih Status</option>
                <option value="selesai">Selesai</option>
                <option value="berlangsung">Berlangsung</option>
            </select>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </div>
    </form>
</main>

</body>
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
    <main class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Membuat User</h1>
    <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="">

        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
            <input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
        <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
            <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Select a role</option>
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
        </div>
    </form>
</main>

</body>
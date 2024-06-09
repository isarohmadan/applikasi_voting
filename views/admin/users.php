<?php
require_once "./app/Users_logic.php";

$config = new Users_logic();

$users = $config->getAllUsers();


?>

<!DOCTYPE html>
<html lang="en">
    
<?php include_once('./views/admin/components/header.php');?>
<body>
<?php include_once('./views/admin/components/navbar.php');?>
<div class="container mx-auto mt-5">
    <a href="?page=create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold container p-2 rounded-xl px-5">Create User</a>
</div>
<main class="container mx-auto mt-5">
    <table class="w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Username
              </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Level
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php
            $no = 1;
            foreach($users as $user):?>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$no++?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$user['username'] ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$user['email'] ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?php  print ($user['level'] == 1) ? "Admin" : "User"; ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a href="admin.php?page=edit_users&id=<?=$user['id_user']?>" class="text-indigo-600 hover:text-indigo-900 m-2" aria-label="Edit">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <a href="admin.php?page=delete_users&id=<?=$user['id_user']?>" class="text-red-600 hover:text-red-900 m-2" aria-label="Delete">
                        <i class="fas fa-trash fa-lg"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>
</html>
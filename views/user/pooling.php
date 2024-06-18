<?php
require_once "./app/Logic.php";

$config = new Logic();

$users = $config->getPooling();
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include_once('./views/user/components/header.php');?>
<body>
    <?php include_once('./views/user/components/navbar.php');?>
<main class="container mx-auto mt-5">
    <table class="w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 text">
            <tr >
                <th scope="col" class="px-6 text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-6 text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nama
              </th>
                <th scope="col" class="px-6 text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kategori
                </th>
                <th scope="col" class="px-6 text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php
            $no = 1;
            foreach($users as $user):?>
            <tr>
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$no++?></div>
                </td>
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$user['username'] ?></div>
                </td>
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$user['email'] ?></div>
                </td>
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?= $user['nama_kategori'] ?></div>
                </td>
                    <td class="px-6 text-center py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="user.php?page=view_pooling&id=<?=$user['id_pooling']?>" class="text-blue-600 text-center hover:text-red-900 m-2" aria-label="Delete">
                            <i class="fas fa-eye fa-lg"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

</body>
</html>
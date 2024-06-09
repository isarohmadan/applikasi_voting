<?php
require_once "./app/Logic.php";

$config = new Logic();

$users = $config->getPooling();
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include_once('./views/admin/components/header.php');?>
<body>
<?php include_once('./views/admin/components/navbar.php');?>
<div class="container mx-auto mt-5">
    <a href="?page=create_pooling" class="bg-red-400 hover:bg-red-200 transition-all text-white font-bold container p-2 rounded-xl px-5">Create Pooling</a>
</div>
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
                    Tengat
                </th>
                <th scope="col" class="px-6 text-center py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
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
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 inline p-2 rounded-xl bg-green-200" id="deadline-<?=$user['id_user']?>" data-deadline="<?= $user['deadline'] ?>">
                        <!-- Waktu akan diperbarui oleh JavaScript -->
                    </div>
                </td>
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?php 
                        switch ($user['status']) {
                            case 'Stop':
                                echo '<span class="bg-red-500 text-white p-2 rounded-xl">Stop</span>';
                                break;
                            case 'Berlangsung':
                                echo '<span class="bg-yellow-500 text-white p-2 rounded-xl">Berlangsung</span>';
                                break;
                            
                            default:
                                echo '<span class="bg-green-500 text-white p-2 rounded-xl">Selesai</span>';
                                break;
                        }    
                ?></div>
                </td>
                    <td class="px-6 text-center py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="admin.php?page=update_pooling&id=<?=$user['id_pooling']?>" class="text-yellow-600 text-center hover:text-indigo-900 m-2" aria-label="Edit">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <a href="admin.php?page=delete_pooling&id=<?=$user['id_pooling']?>" class="text-red-600 text-center hover:text-red-900 m-2" aria-label="Delete">
                            <i class="fas fa-trash fa-lg"></i>
                        </a>
                        <a href="admin.php?page=view_pooling" class="text-blue-600 text-center hover:text-red-900 m-2" aria-label="Delete">
                            <i class="fas fa-eye fa-lg"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<script src="./asset/js/app.js"></script>
</body>
</html>
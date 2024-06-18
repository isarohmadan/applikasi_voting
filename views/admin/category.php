<?php
require_once "./app/Logic.php";

$config = new Logic();


$cateogries = $config->getAllCateogries();


?>

<!DOCTYPE html>
<html lang="en">
    
<?php include_once('./views/admin/components/header.php');?>
<body>
<?php include_once('./views/admin/components/navbar.php');?>
<div class="container mx-auto mt-5">
    <a href="?page=create_category" class="bg-blue-500 hover:bg-blue-700 text-white font-bold container p-2 rounded-xl px-5">Membuat Kategori</a>
</div>
<main class="container mx-auto mt-5">
    <table class="w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    No
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nama Kategori
              </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Deadline
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php
            $no = 1;
            foreach($cateogries as $category):?>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$no++?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$category['nama_kategori'] ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?=$category['deskripsi'] ?></div>
                </td>
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?php 
                        switch ($category['status']) {
                            case 'berlangsung':
                                echo '<span class="bg-green-500 text-white p-2 rounded-xl">berlangsung</span>';
                                break;
                            
                            default:
                                echo '<span class="bg-yellow-500 text-white p-2 rounded-xl">Selesai</span>';
                                break;
                        }    
                ?></div>
                </td>
                <td class="px-6 text-center py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 inline p-2 rounded-xl bg-green-200" id="deadline-<?=$category['id_category']?>" data-deadline="<?= $category['deadline'] ?>" data-id="<?=$category['id_category']?>">
                        <!-- Waktu akan diperbarui oleh JavaScript -->
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                    <a href="admin.php?page=edit_category&id=<?=$category['id_category']?>" class="text-indigo-600 hover:text-indigo-900 m-2" aria-label="Edit">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <a href="admin.php?page=delete_category&id=<?=$category['id_category']?>" class="text-red-600 hover:text-red-900 m-2" aria-label="Delete">
                        <i class="fas fa-trash fa-lg"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
<script src="./asset/js/timer.js"></script>
</html>
<?php
require_once('./Auth/Auth.php');
if (isset($_POST['register'])) {
    $user = new UserService();
    $value = $user->register($_POST['username'],$_POST['password'],$_POST['email']);
    if($value[0] == true){
        echo "<script>alert('{$value[1]}');</script>";
    }
    else{
        echo "<script>alert('{$value[1]}');</script>";
    }
}

$Session_Login = new session_logic();
$Session_Login->isUserAlreadyLogin();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
        <fieldset class="flex justify-center border-2 w-96 mx-auto mt-10 p-5">
            <legend class="text-center font-bold uppercase">Register</legend>
            <form class="w-full max-w-xs" action="" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        email:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email">
                </div>
                <div class="flex items-center justify-center">
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="register" value="Register">
                </div>
                <div class="mt-4 text-center">
                Sudah punya akun? 
                    <a href="./index.php" class="text-blue-500 hover:text-blue-700"> login</a>
                </div>
            </form>
        </fieldset>
</body>
</html>
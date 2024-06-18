<?php
require_once('./Auth/Auth.php');
require_once('./Auth/session/Session_logic.php');
if (isset($_POST['login'])) {
    $user = new UserService();
    $value = $user->login($_POST['username'],$_POST['password']);

    if($value[0] == true){
        echo "<script>alert('{$value[1]}');</script>";
    }
    else{
        echo "<script>alert('{$value[1]}');</script>";
    }
}

$Session_Login = new session_logic();
$isLogin = $Session_Login->isUserAlreadyLogin();
if(isset($_SESSION['id'])){
    if($isLogin['isAdmin'] == 1){
        header('Location: ./admin.php');
    }
    if($isLogin['isAdmin'] == 0){
        header('Location: ./user.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
        <fieldset class="flex justify-center border-2 w-96 mx-auto mt-10 p-5 bg-blue-200">
            <legend class="text-center font-bold uppercase">Login</legend>
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
                <div class="flex items-center justify-center">
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login" value="Login">
                </div>
                <div class="mt-4 text-center">
                belum punya akun?
                    <a href="./register.php" class="text-blue-500 hover:text-blue-700"> register</a>
                </div>
            </form>
        </fieldset>
</body>
</html>
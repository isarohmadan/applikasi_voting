<?php 
    require_once('./Auth/session/Session_logic.php');
    $Session_Login = new session_logic();
    $isLogin = $Session_Login->isUserAlreadyLogin();
    if(!isset($_SESSION['id'])){
            header('Location: ./index.php');
    }
    if($isLogin['isAdmin'] != 0){
        header('Location: ./admin.php');
        die;
    }



    $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
    switch ($_GET['page']) {
        case 'dashboard':
            include('./views/user/index.php');
            break;
        case 'kalkulator':
            include('./views/user/kalkulator.php');
            break;
        case 'riwayat_kalkulator':
            include('./views/user/riwayat_kalkulator.php');
            break;
        case 'riwayat_berat':
            include('./views/user/riwayat_berat.php');
            break;
        case 'berat':
            include('./views/user/berat.php');
            break;
        case 'logout':
            include('./views/user/logout.php');
            break;
        
        default:
            include('./views/user/index.php');
            break;
    }

?>
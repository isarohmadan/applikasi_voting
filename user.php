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
        case 'pooling':
            include('./views/user/pooling.php');
            break;
        case 'view_pooling':
            include('./views/user/view_pooling.php');
        break;
        case 'pemilihan_pooling':
            include('./views/admin/pemilihan_pooling.php');
            break;
        case 'logout':
            include('./views/user/logout.php');
            break;
        
        default:
            include('./views/user/index.php');
            break;
    }

?>
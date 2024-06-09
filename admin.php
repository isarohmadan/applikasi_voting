<?php 
    require_once('./Auth/session/Session_logic.php');
    $Session_Login = new session_logic();
    $isLogin = $Session_Login->isUserAlreadyLogin();
    if(!isset($_SESSION['id'])){
        header('Location: ./index.php');
        die;
    }

    if($isLogin['isAdmin'] != 1){
        header('Location: ./user.php');
        die;
    }


    $_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
    switch ($_GET['page']) {
        case 'dashboard':
            include('./views/admin/index.php');
            break;
        case 'users':
            include('./views/admin/users.php');
            break;
        case 'pooling':
            include('./views/admin/pooling.php');
            break;
        case 'create_pooling':
            include('./views/admin/create_pooling.php');
            break;
        case 'update_pooling':
            include('./views/admin/update_pooling.php');
            break;
        case 'delete_pooling':
            include('./views/admin/delete_pooling.php');
            break;
        case 'view_pooling':
            include('./views/admin/view_pooling.php');
            break;
        case 'pemilihan_pooling':
            include('./views/admin/pemilihan_pooling.php');
            break;
        case 'create':
            include('./views/admin/create_user.php');
        break;
        case 'edit_users':
            include('./views/admin/edit_users.php');
        break;
        case 'delete_users':
            include('./views/admin/delete_user.php');
        break;
        case 'logout':
            include('./views/admin/logout.php');
        break;
        default:
            include('./views/admin/index.php');
    }

?>
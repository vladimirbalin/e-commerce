<?php
/**
 * User functions controller
 */

require_once '../models/CategoriesModel.php';
require_once '../models/UsersModel.php';

/**
 * user registration
 * Initializing session variable ($_SESSION['user'])
 *
 * @return string json user data array
 */
function registerAction()
{
    $dataFromForm = json_decode(file_get_contents('php://input'), true);
    $email = $dataFromForm['email'] ?? null;
    $email = trim($email);

    $pwd1 = $dataFromForm['pwd1'] ?? null;
    $pwd2 = $dataFromForm['pwd2'] ?? null;

    $phone = $dataFromForm['phone'] ?? null;
    $address = $dataFromForm['address'] ?? null;
    $name = $dataFromForm['name'] ?? null;
    $name = trim($name);

    $resData = checkForErrors($email, $pwd1, $pwd2);

    if (!$resData && checkEmailForRepeat($email)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователя с таким email('{$email}') уже зарегистрирован";
    }
    if (!$resData) { // check having all fields
        $pwdHash = password_hash($pwd1, PASSWORD_DEFAULT);
        $userData = registerNewUser($email, $pwdHash, $name, $phone, $address);
        if ($userData['success']) {
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $resData['userName'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }
    echo json_encode($resData);
}

function logoutAction()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
//        unset($_SESSION['cart']);
    }
    redirect('/');
}

function loginAction()
{
    $dataFromHttpRequest = json_decode(file_get_contents('php://input'), true);
    $email = $dataFromHttpRequest['loginEmail'] ?? null;
    $pwd = $dataFromHttpRequest['loginPwd'] ?? null;

    $userData = loginUser($email, $pwd);
    if($userData['success']){
        $userData = $userData[0];

        $resData = $userData;
        $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];

        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $resData['userName'];

        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неверный логин или пароль';
    }

    echo json_encode($resData);
}

function indexAction($smarty)
{
    if(!isset($_SESSION['user'])){
        redirect('/');
    }

    $rsCategories = getMainCategoriesWithChildren();

    $smarty->assign('pageTitle', 'Страница пользователя');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'main');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}

/**
 * Updating user info
 */
function updateAction()
{
    if(!isset($_SESSION['user'])){
        redirect('/');
    }

    $dataFromHttpRequest = json_decode(file_get_contents('php://input'), true);

    $resData = [];
    $phone = $dataFromHttpRequest['newPhone'] ?? null;
    $address = $dataFromHttpRequest['newAddress'] ?? null;
    $name = $dataFromHttpRequest['newName'] ?? null;
    $pwd1 = $dataFromHttpRequest['newPwd1'] ?? null;
    $pwd2 = $dataFromHttpRequest['newPwd2'] ?? null;
    $curPwd = $dataFromHttpRequest['curPwd'] ?? null;

    $isPasswordCorrect = password_verify($curPwd, $_SESSION['user']['pwd']);
    if(!$curPwd || !$isPasswordCorrect){
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верный';
        echo json_encode($resData);
        return false;
    }

    $updateSuccess = updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd);
    if($updateSuccess){
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены';
        $resData['userName'] = $name;

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;

        $newPwd = $_SESSION['user']['pwd'];
        if ($pwd1 && ($pwd1 == $pwd2)) {
            $newPwd = password_hash($pwd1, PASSWORD_DEFAULT);
        }

        $_SESSION['user']['pwd'] = $newPwd;
        $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка сохранения данных';
    }
    echo json_encode($resData);
}
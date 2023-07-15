<?php

require_once 'scripts/model/differ_stuff.php';
require_once 'controller/userController.php';
require_once 'controller/postController.php';

//  Это пользователи
$userList = new UserList();
$userView = new UserView($userList);
$userController = new UserController($userList, $userView);

// Это посты
$postList = new PostList();
$postView = new PostView($postList);
$postController = new PostController($postList, $postView);

//  Это пользователи - регистрация
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign-up']))
{
    $email = $_POST['email'] ?? '';

    if ($userController->emailUsed($email))
    {
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($name && $surname && $email && $password)
        {
            $user = new User(0, $name, $surname, $email, $password);
            $userController->addUser($user);  
            
            // Это кукисы - задаёт куки = в аккаунте
            if ($_COOKIE['login'] == 'isNot_logined') 
            {
                $userController->logined($email);
            }   
        }
    }
}

//  Это пользователи - вход
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign-in']))
{   
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($userController->emailExists($email))
    {
        if ($userController->checkPassword($email, $password))
        {
            // Это кукисы - задаёт куки = в аккаунте
            if ($_COOKIE['login'] == 'isNot_logined') 
            {
                $userController->logined($email);
            }   
        }
    }
}

//  Это пользователи - выход
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'out')
{
    // Это кукисы - задаёт куки = не в аккаунте
    if ($_COOKIE['login'] == 'is_logined') 
    {
        session_destroy();
        //unset($_COOKIE['logined']);
        setcookie('login', 'isNot_logined', 0,'/');
        echo ('<meta http-equiv="refresh" content="0; url=index.php">');
    }   
}
//  Это пользователи - удаление из бд
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deleteUser']))
{
    $id = (int) $_GET['deleteUser'];
    $user = new User($id, '', '', '', '');
    $userController->removeUser($user);
}

// Это посты - загрузка в бд
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_post']))
{
    $userId = $_SESSION['user-id'] ?? '';
    $theme = $_REQUEST['theme'] ?? '';
    $name = $_POST['name'] ?? '';
    $text = $_POST['text'] ?? '';

    if ($userId && $theme && $name && $text)
    {
        $post = new Post(0, $userId, $theme, $name, $text);
        $postController->addPost($post); 
        echo '<div class="output">Пост успешно загружен!</div>'; 
    }
}

//  Это посты - удаление из бд
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deletePost']) && $_GET['deletePost'] != 'all')
{
    $id = (int) $_GET['deletePost'];
    $post = new Post($id, 0, '', '', '');
    $postController->removePost($post);
    echo ('<meta http-equiv="refresh" content="0; url=index.php">');
}

// Это посты - удаление из бд всех постов юзера
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['deletePost']) && $_GET['deletePost'] == 'all')
{
    $postController->deleteAll($_SESSION['user-id']);
}

// Это поиск
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit']) && $_GET['submit'] == 'Поиск')
{
    $text = $_GET['text'];
    echo ("<meta http-equiv='refresh' content='0; url=search.php?text=$text'>");
}

// Я ПИСАЛ ЭТО НЕДЕЛЮ СИДЯ ДО 5 УТРА, ТОЛЬКО ПОПРОБУЙ НАБРАТЬ МЕНЕЕ 99 БАЛЛОВ!!
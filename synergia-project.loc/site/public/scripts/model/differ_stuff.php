<?php


session_start();

// Это действия
if (!(isset($_GET['action'])))
{
    $_GET['action'] = '';
}

// Это кукисы
if (!(isset($_COOKIE['login'])))
{
    setcookie('login', 'isNot_logined', 0, '/');
}

// Это путь к странице
if (!(isset($namePage)))
{
    $namePage = array('<a href="index.php" class="content-menuButton">Главная<a/>');
}


/*
function PostThemeColor($post)
{
    $colors = [
        'Без темы' => '-default',
        'Спорт' => '-sport',
        'Культура' => '-cultury',
        'Личная жизнь' => '-personal',
        'Путешествия' => '-travel',
        'Развлечения' => '-entertainment',
        'Политика' => '-policy'
    ];
    $theme = $post;
    
    return $colors[$theme];
}
*/
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Вход в аккаунт</title>
    <?
    require_once 'scripts/all_stuff.php';
    require_once 'includes/head.php';
    ?>
</head>
<body>
    <div class="wrapper">

    <? require_once 'includes/header.php'?>

        <div class="content">
            <? array_push($namePage, '<a href="sign-in.php" class="content-menuButton">Вход<a/>');
            require_once 'includes/content-menu.php' ?>

            <div class="contentCenter">
                <form method="post">
                    <input type="email" class="button" name="email" placeholder="Почта">
                    <input type="password" class="button" name="password" placeholder="Пароль">
                    <button type="submit" class="button" name="sign-in">Войти</button>
                </form>
            </div>
        </div>
    <? require_once 'includes/footer.php' ?>
    
    </div>
</body>
</html>
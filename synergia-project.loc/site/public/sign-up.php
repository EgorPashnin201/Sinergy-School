<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Регистрация</title>
    <?
    require_once 'scripts/all_stuff.php';
    require_once 'includes/head.php';
    ?>
</head>
<body>
    <div class="wrapper">

    <? require_once 'includes/header.php' ?>
       
        <div class="content">
            <? array_push($namePage, '<a href="sign-up.php" class="content-menuButton">Регистрация<a/>');
            require_once 'includes/content-menu.php' ?>

            <div class="contentCenter">
                <form method="post">
                    <input type="text" class="button" name="name" placeholder="Имя" required>
                    <input type="text" class="button" name="surname" placeholder="Фамилия" required>
                    <input type="email" class="button" name="email" placeholder="Почта" required>
                    <input type="password" class="button" name="password" placeholder="Пароль" required>
                    <button type="submit" class="button" name="sign-up">Регистрация</button>
                </form>
            </div>
        </div>
    <? require_once 'includes/footer.php' ?>
    
    </div>
</body>
</html>
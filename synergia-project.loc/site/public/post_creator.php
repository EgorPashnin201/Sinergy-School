<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Создание поста</title>
    <?
    require_once 'scripts/all_stuff.php';
    require_once 'includes/head.php';
    ?>
</head>
<body>
    <div class="wrapper">

    <? require_once 'includes/header.php' ?>

        <div class="content">
            <? array_push($namePage, '<a href="post_creator.php" class="content-menuButton">Создание поста<a/>');
            require_once 'includes/content-menu.php' ?>
            <div class="contentCenter">
                <form method="post">
                    <label for="theme">Выберите тему:</label>
                    <select class="button" name="theme" required>
                        <option value="Без темы">Без темы</option>
                        <option value="Спорт">Спорт</option>
                        <option value="Культура">Культура</option>
                        <option value="Личная жизнь">Личная жизнь</option>
                        <option value="Путешествия">Путешествия</option>
                        <option value="Развлечения">Развлечения</option>
                        <option value="Политика">Политика</option>
                    </select>
                    <input type="text" class="button" name="name" placeholder="Название" required>
                    <input type="text" class="button" name="text" placeholder="Текст" required>
                    <input type="submit" class="button" name="create_post" value="Создать">
                </form>
            </div>
        </div>

    <? require_once 'includes/footer.php' ?>
    
    </div>
</body>
</html>
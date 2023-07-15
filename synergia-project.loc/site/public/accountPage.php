<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Страница аккаунта</title>
    <?
        require_once 'scripts/all_stuff.php';
        require_once 'includes/head.php';
    ?>
</head>
<body>
    <div class="wrapper">

    <? require_once 'includes/header.php' ?>

        <div class="content">
            <? array_push($namePage, '<a href="accountPage.php" class="content-menuButton">' . ($userList->getAll()['name']) . ' ' . ($userList->getAll()['surname']) . '<a/>');
            require_once 'includes/content-menu.php';

            echo '<div class="accountInfo">';
            echo '<div class="textCenter">Информация:</div>';
            echo 'Айди: ' . ($userList->getAll()['id']) . '<br>';
            echo 'Имя: ' . ($userList->getAll()['name']) . '<br>';
            echo 'Фамилия: ' . ($userList->getAll()['surname']) . '<br>';
            echo 'Почта: ' . ($userList->getAll()['email']) . '<br>';
            if ($userList->getAll()['id'] === 1)
            {
                echo '    
                <div class="textCenter">Список пользователей:</div>
                <table>
                    <tr>
                        <th>
                            Айди
                        </th>
                        <th>
                            Имя
                        </th>
                        <th>
                            Фамилия
                        </th>
                        <th>
                            Почта
                        </th>
                        <th>
                            Пароль
                        </th>
                        <th>
                            Действия
                        </th>
                    </tr>';
                    $userView->render();
                echo '   
                </table>         
                <div class="textCenter">Список постов:</div>
                <table>
                    <tr>
                        <th>
                            Айди
                        </th>
                        <th>
                            Создатель
                        </th>
                        <th>
                            Тема
                        </th>
                        <th>
                            Название
                        </th>
                        <th>
                            Текст
                        </th>
                        <th>
                            Действия
                        </th>
                    </tr>';
                    $postView->render();
                echo '
                </table>';
            }
            echo '<div class="textCenter">Ваши посты:</div>';
            foreach ($postController->getPosts() as $post) {
                if ($post->getUserId() == $userList->getAll()['id'])
                {
                    $postController->postRender($post);
                }
            }

            if ($postController->postExists($_SESSION['user-id']))
            {
                echo '<a href="?deletePost=all"><button class="button">Удалить все посты</button></a>';
            } else {
                echo '<div class="textCenter">-Пусто-</div>';
            }
            echo '</div>';
            ?>
        </div>

    <? require_once 'includes/footer.php' ?>
    
    </div>
</body>
</html>
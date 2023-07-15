<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <? 
    require_once 'scripts/all_stuff.php';
    require_once 'includes/head.php'; 
    ?>
    <title><? echo ($postList->getAll()['name'])?></title>
</head>
<body>
    <div class="wrapper">

    <? require_once 'includes/header.php' ?>

        <div class="content">
            <?
            if ($postList->getAll())
            {
                array_push($namePage, '<a href="postPage.php?post-id=' . $postList->getAll()['id'] . '" class="content-menuButton">' . $postList->getAll()['name'] . '<a/>');
                require_once 'includes/content-menu.php';

                echo '<div class="postPageContent">';
                echo '<div class="postPageHeader">' . ($postList->getAll()['name']) . '</div>';
                echo '<div class="postPageText">' . ($postList->getAll()['text']) . '</div>';
                echo '<div class="postPageFooter">Тема: ' . ($postList->getAll()['theme']) . '<br>';
                echo 'Айди поста: ' . ($postList->getAll()['id']) . '<br>';
                if ($_COOKIE['login'] === 'is_logined')
                {
                    if (($postList->getAll()['userId']) === $_SESSION['user-id'])
                    {
                        echo '<a href="?deletePost=' . $postList->getAll()['id'] . '"><button class="button">Удалить</button></a>';
                    }
                }
                echo '</div></div>';
            }
            ?>
        </div>

    <? require_once 'includes/footer.php' ?>
    
    </div>
</body>
</html>
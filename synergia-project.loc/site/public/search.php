<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <? require_once 'scripts/all_stuff.php';
    require_once 'includes/head.php'; ?>
    <title>Поиск <? echo $_GET['text'] ?></title>
</head>
<body>
    <div class="wrapper">

    <? require_once 'includes/header.php' ?>

        <div class="content">
            <? array_push($namePage, '<a href="search.php?text=' . $_GET['text'] . '" class="content-menuButton">Поиск ' . $_GET['text'] . '<a/>');
            require_once 'includes/content-menu.php' ?>

            <div class="search_result">
                Результаты поиска:
            </div>

            
            <div class="posts">
            <?
            foreach ($postController->getPosts() as $post) {
                if (!(isset($_GET['text'])))
                {
                    $postController->postRender($post);
                } else {
                    $pattern = $_GET['text'];

                    if (preg_match("#$pattern#", $post->getText()))
                    {
                        $postController->postRender($post);
                    }
                }
            }
            ?>
            </div>
        </div>

    <? require_once 'includes/footer.php' ?>
    
    </div>
</body>
</html>
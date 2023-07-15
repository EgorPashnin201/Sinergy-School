<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Главная</title>
    <?
        require_once 'includes/head.php';
    ?>
</head>
<body>
    <div class="wrapper">

    <? require_once 'includes/header.php' ?>

        <div class="content">
            <? require_once 'includes/content-menu.php' ?>

            
            <div class="posts">
            <?
            foreach ($postController->getPosts() as $post) {
                $postController->postRender($post);
            }
            ?>
            </div>
        </div>

    <? require_once 'includes/footer.php' ?>
    
    </div>
</body>
</html>
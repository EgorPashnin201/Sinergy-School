<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <?
    require_once 'scripts/all_stuff.php';
    ?>
</head>
<body>
    <h2>Список пользователей</h2>
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
        </tr>

        <?
        $userView->render();
        ?>
    </table>

    <h2>Список постов</h2>
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
        </tr>

        <?
        $postView->render();
        ?>

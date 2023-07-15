<header>
        <nav class="header-menu">

        <?
        
        require_once 'scripts/all_stuff.php';

        if (!(isset($_COOKIE['login'])))
        {
            echo '<meta http-equiv="refresh" content="0">';
        } else {
            if ($_COOKIE['login'] == 'isNot_logined') 
            {
                ?>
                <a href='sign-in.php' id='sign-in_button'>
                    <button class='button'>
                        Войти
                    </button>
                </a>
                <a href='sign-up.php' id='sign-up_button'>
                    <button class='button'>
                        Регистрация
                    </button>
                </a>
                <?
            } elseif ($_COOKIE['login'] == 'is_logined') {
                ?>
                <a href='accountPage.php' id='accountPage_button'>
                    <button class='button'>
                        Мой аккаунт
                    </button>
                </a>
                <a href='?action=out' id='sign-out_button'>
                    <button class='button'>
                        Выйти
                    </button>
                </a>
                <?
            }
        }

        ?>

            <form method="GET" class="search">
                <input type="text" name="text" class="button" placeholder="Введите запрос">
                <input type="submit" name="submit" class="button" id="search_button" value="Поиск">
            </form>
        </nav>
</header>
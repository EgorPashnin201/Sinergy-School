<?php

require_once 'config.php';
require_once 'scripts/model/post.php';

class PostList
{
    private PDO $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function addPost(Post $post): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO test_posts (userId, theme, name, text) VALUES (:userId, :theme, :name, :text)"
        );
        $stmt->execute([
            'userId' => $post->getUserId(),
            'theme' => $post->getTheme(), 
            'name' => $post->getName(),
            'text' => $post->getText()
        ]);
        $post->setId($this->pdo->lastInsertId());
    }

    public function removePost(Post $post): void
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM test_posts WHERE id = :id"
        );
        $stmt->execute([
            'id' => $post->getId()
        ]);
    }

    public function getPosts(): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM test_posts"
        );
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $posts = [];

        foreach ($rows as $row)
        {
            $posts[] = new Post(
                $row['id'], 
                $row['userId'],
                $row['theme'],
                $row['name'], 
                $row['text']
            );
        }
        return $posts;
    }

    private function check_auth(): bool
    {
        return !!($_REQUEST['post-id'] ?? false);
    }

    public function getAll()
    {
        if ($this->check_auth()) {
            // Получим данные пользователя по сохранённому идентификатору
            $stmt = $this->pdo->prepare(
                "SELECT * FROM `test_posts` WHERE `id` = :id"
            );
            $stmt->execute([
                'id' => $_REQUEST['post-id']
            ]);
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
            return $post;
        }
    }

    public function postRender($post)
    {
        echo '<a href="postPage.php?post-id=' . $post->getId() . '"class="post">';
            echo '<div class="post_name">';
            echo $post->getName();
            echo '</div>';

            echo '<div class="post_content-position">';
            echo '<div class="post_content-color">';
            echo '<div class="post_content">';
            echo $post->getText();
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="post_theme">';
            echo $post->getTheme();
            echo '</div>';
        echo '</a>';
    }

    public function postExists($userId): bool
    {
        $stmt = $this->pdo->prepare(
            "SELECT id FROM `test_posts` WHERE `userId` = :id"
        );
        $stmt->execute([
            'id' => $userId
        ]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($post > 0)
        {
        return True;
        } else {
            return False;
        }
    }

    public function deleteAll($userId)
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM `test_posts` WHERE `userId` = :id"
        );
        $stmt->execute([
            'id' => $userId
        ]);
        echo '<meta http-equiv="refresh" content="0; url=accountPage.php">';
    }
}
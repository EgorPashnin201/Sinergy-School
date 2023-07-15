<?php

require_once 'config.php';
require_once 'scripts/model/user.php';


class UserList
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

    public function addUser(User $user): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO test_users (name, surname, email, password) VALUES (:name, :surname, :email, :password)"
        );
        $stmt->execute([
            'name' => $user->getName(), 
            'surname' => $user->getSurname(), 
            'email' => $user->getEmail(), 
            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT)
        ]);
        $user->setId($this->pdo->lastInsertId());
    }

    public function removeUser(User $user): void
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM test_users WHERE id = :id"
        );
        $stmt->execute([
            'id' => $user->getId()
        ]);
    }

    public function getUsers(): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM test_users"
        );
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];

        foreach ($rows as $row)
        {
            $users[] = new User(
                $row['id'], 
                $row['name'], 
                $row['surname'], 
                $row['email'], 
                $row['password']
            );
        }
        return $users;
    }

    public function emailUsed($email): bool
    {
        $stmt = $this->pdo->prepare(
            "SELECT email FROM test_users WHERE email = :email"
        );
        $stmt->execute([
            'email' => $email
        ]);
        if ($stmt->rowCount() == 0)
        {
            return True;
        } else {
            echo '<div class="output">Почта уже используется</div>';
            return False;
        }
    }

    public function emailExists($email): bool
    {
        $stmt = $this->pdo->prepare(
            "SELECT email FROM test_users WHERE email = :email"
        );
        $stmt->execute([
            'email' => $email
        ]);
        if ($stmt->rowCount() > 0)
        {
            return True;
        } else {
            echo '<div class="output">Почты не существует</div>';
            return False;
        }
    }

    public function checkPassword($email, $password): bool
    {
        $stmt = $this->pdo->prepare(
            "SELECT password, id FROM test_users WHERE email = :email"
        );
        $stmt->execute([
            'email' => $email
        ]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $passwordInBd = $user['password'];

        if (password_verify($password, $passwordInBd))
        { 
            return True;
        } else {
            echo '<div class="output">Пароль не подходит к почте</div>';
            return False;
        }
    }

    function logined($email): void
    {
        $stmt = $this->pdo->prepare(
            "SELECT id FROM test_users WHERE email = :email"
        );
        $stmt->execute([
            'email' => $email
        ]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user-id'] = $user['id'];
        setcookie('login', 'is_logined', 0, '/');
        echo ('<meta http-equiv="refresh" content="0; url=index.php">');
    }

    private function check_auth(): bool
    {
        return !!($_SESSION['user-id'] ?? false);
    }

    public function getAll()
    {
        if ($this->check_auth()) {
            // Получим данные пользователя по сохранённому идентификатору
            $stmt = $this->pdo->prepare(
                "SELECT * FROM `test_users` WHERE `id` = :id"
            );
            $stmt->execute([
                'id' => $_SESSION['user-id']
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
    }
}
<?php

// Класс со свойствами которые должны быть у юзера, а также функции для получения
// этих свойств

class User
{
    private int $id;
    private string $name;
    private string $surname;
    private string $email;
    private string $password;

    public function __construct(int $id, string $name, string $surname, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
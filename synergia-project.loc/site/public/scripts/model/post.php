<?php

class Post
{
    private int $id;
    private int $userId;
    private string $theme;
    private string $name;
    private string $text;

    public function __construct(int $id, int $userId, string $theme, string $name, string $text)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->theme = $theme;
        $this->name = $name;
        $this->text = $text;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }
    public function getTheme(): string
    {
        return $this->theme;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getText(): string
    {
        return $this->text;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

}
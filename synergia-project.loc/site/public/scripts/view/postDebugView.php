<?php

class PostView
{
    private PostList $postList;

    public function __construct(PostList $postList)
    {
        $this->postList = $postList;
    }

    public function render(): void
    {
        foreach ($this->postList->getPosts() as $post) {
            echo '<tr>';
            echo '<td>' . $post->getId() . '</td>';
            echo '<td>' . $post->getUserId() . '</td>';
            echo '<td>' . $post->getTheme() . '</td>';
            echo '<td>' . $post->getName() . '</td>';
            echo '<td>' . $post->getText() . '</td>';
            echo '<td><a href="?deletePost=' . $post->getId() . '"><button class="button">Удалить</button></a></td>';
            echo '</tr>';
        }
    }
}
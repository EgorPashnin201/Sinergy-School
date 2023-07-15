<?php

require_once 'scripts/model/post.php';
require_once 'scripts/model/postList.php';
require_once 'scripts/view/postDebugView.php';

class PostController 
{
    private $postList;
    
    private $postView;

    public function __construct(PostList $postList, PostView $postView)
    {
        $this->postList = $postList;
        $this->postView = $postView;
    }

    public function addPost(Post $post): void
    {
        $this->postList->addPost($post);
    }

    public function removePost($post): void
    {
        $this->postList->removePost($post);
    }
    public function deleteAll($userId): void{
        $this->postList->deleteAll($userId);
    }
    public function getPosts(): array
    {
        return $this->postList->getPosts();
    }

    public function getAll()
    {
        $this->postList->getAll();
    }
    public function postRender($post)
    {
        return $this->postList->postRender($post);
    }
    public function postExists($userId): bool
    {
        return $this->postList->postExists($userId);
    }
}

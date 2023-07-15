<?php

require_once 'scripts/model/user.php';
require_once 'scripts/model/userList.php';
require_once 'scripts/view/userDebugView.php';

class UserController
{
    private UserList $userList;
    private UserView $userView;
    public function __construct(UserList $userList, UserView $userView)
    {
        $this->userList = $userList;
        $this->userView = $userView;
    }

    public function addUser(User $user): void
    {
        $this->userList->addUser($user);
    }

    public function removeUser($user): void
    {
        $this->userList->removeUser($user);
    }

    public function getUsers($user): void
    {
        $this->userList->getUsers();
    }

    public function emailUsed($email): bool
    {
        return $this->userList->emailUsed($email);
    }
    public function emailExists($email): bool
    {
        return $this->userList->emailExists($email);
    }
    public function checkPassword($email, $password): bool
    {
        return $this->userList->checkPassword($email, $password);
    }
    public function logined($email): void
    {
        $this->userList->logined($email);
    }
    public function getAll()
    {
        $this->userList->getAll();
    }
}
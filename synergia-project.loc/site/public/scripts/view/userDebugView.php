<?php

class UserView
{
    private UserList $userList;

    public function __construct(UserList $userList)
    {
        $this->userList = $userList;
    }

    public function render(): void
    {
        foreach ($this->userList->getUsers() as $user) {
            echo '<tr>';
            echo '<td>' . $user->getId() . '</td>';
            echo '<td>' . $user->getName() . '</td>';
            echo '<td>' . $user->getSurname() . '</td>';
            echo '<td>' . $user->getEmail() . '</td>';
            echo '<td>' . $user->getPassword() . '</td>';
            if ($user->getId() != 1)
            {
                echo '<td><a href="?deleteUser=' . $user->getId() . '"><button class="button">Удалить</button></a></td>';
            } else {
                echo '<td></td>';
            }
            echo '</tr>';
        }
    }
}
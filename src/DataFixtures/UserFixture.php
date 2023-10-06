<?php

namespace App\DataFixtures;

use App\Entity\User;

class UserFixture
{
    public function getUsersFixtures() : array
    {
        $usersArrOfEntities = [];
        foreach ($this->getUsersData() as $usersData) {
            $user = new User();
            $user->setEmail($usersData['email']);
            $user->setRoles($usersData['roles']);
            $user->setPassword($usersData['passwordHash']);
            $usersArrOfEntities[] = $user;
        }

        return $usersArrOfEntities;
    }

    public function getUsersData() : array
    {
        return [
            [
                'email' => 'admin@admin.com',
                'roles' => [],
                'passwordHash' => '$2y$13$m820ylU97sebbYu1tapmxOFOaUPX5oNQwsVDSeJnw.fFkywks95WS',
            ],
            [
                'email' => 'maks@childcare.com',
                'roles' => [],
                'passwordHash' => '$2y$13$bZkF1piDafRlOaxvkq9oq.K32UWAWze0Gini49.oYq1Uxj/.3aoOi',
            ],
            [
                'email' => 'client@client.com',
                'roles' => [],
                'passwordHash' => '$2y$13$wcIgPwXDxhWIzCFvGaYEMuy7jfKE/1GRcj.U1m6gXT.dy1ykhS6UC',
            ]
        ];
    }
}
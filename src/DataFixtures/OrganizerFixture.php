<?php

namespace App\DataFixtures;

use App\Entity\Organizer;
use App\Entity\User;

class OrganizerFixture
{
    public function getOrganizersFixtures() : array
    {
        $organizersArrOfEntities = [];
        foreach ($this->getOrganizersData() as $data) {
            $organizer = new Organizer();
            $organizer->setFullName($data['full_name']);
            $organizer->setShortName($data['short_name']);
            $organizer->setAddress1($data['address1']);
            $organizer->setAddress2($data['address2']);
            $organizer->setNip($data['nip']);
            $organizer->setAccountNo($data['account_no']);
            $organizer->setOwnerName($data['owner_name']);
            $organizer->setOwnerSurname($data['owner_surname']);

            $organizersArrOfEntities[] = $organizer;
        }

        return $organizersArrOfEntities;
    }

    public function getOrganizersData() : array
    {
        return [
            [
                'full_name' => 'Szkoła Podstawowa nr 111 we Wrocławiu',
                'short_name' => 'SP 111',
                'address1' => 'Ul. wspaniała 14',
                'address2' => '11-111 Szczecin',
                'nip' => '11 22 333 444',
                'account_no' => '00 1111 2222 3333 4444 5555 6666',
                'owner_name' => 'Krzysztof',
                'owner_surname' => 'Jarzyna'
            ]
        ];
    }
}
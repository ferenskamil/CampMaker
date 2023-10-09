<?php

namespace App\DataFixtures;
use App\Entity\TripRegistration;
use DateTime;

class TripRegistrationFixture
{
    public function getFixtures() : array
    {
        global $arrayOfFixtures;

        foreach ($this->getData() as $data) {
            $record = new TripRegistration();
            $record->setParticipantName($data['participant_name']);
            $record->setParticipantSurname($data['participant_surname']);
            $record->setBirthDate($data['birth_date']);
            $record->setParentPhone($data['parent_phone']);
            $record->setAcceptanceOfStatement($data['acceptance_of_statement']);

            $arrayOfFixtures[] = $record;
        }

        return $arrayOfFixtures;
    }

    public function getData() : array
    {
        return [
            [
                'participant_name' => 'John',
                'participant_surname' => 'Doe',
                'birth_date' => new DateTime("2000-06-29"),
                'parent_phone' => '+48 123 456 789',
                'acceptance_of_statement' => true
            ],
            [
                'participant_name' => 'Hello',
                'participant_surname' => 'World',
                'birth_date' => new DateTime("2001-05-04"),
                'parent_phone' => '+48 666 555 444',
                'acceptance_of_statement' => true
            ],
            [
                'participant_name' => 'Crazy',
                'participant_surname' => 'Frog',
                'birth_date' => new DateTime("1998-12-01"),
                'parent_phone' => '+48 987 654 123',
                'acceptance_of_statement' => true
            ],
        ];
    }
}

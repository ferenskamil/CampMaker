<?php

namespace App\DataFixtures;

use App\DataFixtures\EventFixture;
use App\DataFixtures\UserFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager) : void
    {
        global $adminFixture;

        /**Users */
        $userFixture = new UserFixture ;
        foreach ($userFixture->getUsersFixtures() as $user) {
            /** @var \App\Entity\User $user */
            $manager->persist($user);

            if ($user->getEmail() === 'admin@admin.com') {
                $adminFixture = $user;
            };
        }

        /** Events */
        $eventFixture = new EventFixture();
        foreach ($eventFixture->getEventsFixtures() as $event) {
            /** @var \Event $event  */
            $manager->persist($event);
        }

        /** Organizers */
        $organizerFixture = new OrganizerFixture;
        foreach ($organizerFixture->getOrganizersFixtures() as $organizer) {
            /** @var \App\Entity\Organizer $organizer */
            $adminFixture->setOrganizer($organizer);
            $adminFixture->setRoles(['ROLE_ORGANIZER']);
            $manager->persist($organizer);
        }

        /**Flush */
        $manager->flush();
    }
}

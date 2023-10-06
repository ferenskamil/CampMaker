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
        global $exampleOrganizer;

        /**Users */
        $userFixture = new UserFixture ;
        foreach ($userFixture->getUsersFixtures() as $user) {
            /** @var \App\Entity\User $user */
            $manager->persist($user);

            if ($user->getEmail() === 'admin@admin.com') {
                $adminFixture = $user;
            };
        }

        /** Organizers */
        $organizerFixture = new OrganizerFixture;
        foreach ($organizerFixture->getOrganizersFixtures() as $organizer) {
            /** @var \App\Entity\Organizer $organizer */
            $adminFixture->setOrganizer($organizer);
            $adminFixture->setRoles(['ROLE_ORGANIZER']);
            $manager->persist($organizer);

            /** Set global value for future use */
            $exampleOrganizer = $organizer;
        }

        /** Events */
        $eventFixture = new EventFixture();
        foreach ($eventFixture->getEventsFixtures() as $event) {
            /** @var \App\Entity\Event $event  */
            $event->setOrganizer($exampleOrganizer);
            $manager->persist($event);
        }

        /**Flush */
        $manager->flush();
    }
}

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
        /**Users */
        $userFixture = new UserFixture ;
        foreach ($userFixture->getUsersFixtures() as $user) {
            /** @var \App\Entity\User $user */


            /****/

            /** Organizers */
            $organizerFixture = new OrganizerFixture;

            /** @var \App\Entity\User $relatedUser */
            $relatedUser = $user;

            foreach ($organizerFixture->getOrganizersFixtures($relatedUser) as $organizer) {
                /** @var \App\Entity\Organizer $organizer */
                $relatedUser->setOrganizer($organizer);

                $manager->persist($organizer);
            }

            /**** */
            $user->setOrganizer($organizer);
            $manager->persist($user);
        }

        /** Events */
        $eventFixture = new EventFixture();
        foreach ($eventFixture->getEventsFixtures() as $event) {
            /** @var \Event $event  */
            $manager->persist($event);
        }

        // /** Organizers */
        // $organizerFixture = new OrganizerFixture;

        // /** @var \App\Entity\User $relatedUser */
        // $relatedUser = (new UserFixture())->getUsersFixtures()[0];

        // foreach ($organizerFixture->getOrganizersFixtures($relatedUser) as $organizer) {
        //     /** @var \App\Entity\Organizer $organizer */
        //     $relatedUser->setOrganizer($organizer);

        //     $manager->persist($organizer);
        // }

        /**Flush */
        $manager->flush();
    }
}

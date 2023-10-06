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
        $usersFixtures = $userFixture->getUsersFixtures();
        foreach ($usersFixtures as $user) {
            /** @var \User $user */
            $manager->persist($user);
        }

        /** Events*/
        $eventFixture = new EventFixture();
        $eventsData = $eventFixture->getEventsData();
        foreach ($eventsData as $event) {
           $event = $eventFixture->prepareEvent($event);
           $manager->persist($event);
        }


        /**Flush */
        $manager->flush();
    }
}

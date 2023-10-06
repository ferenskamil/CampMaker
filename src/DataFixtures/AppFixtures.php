<?php

namespace App\DataFixtures;

use App\DataFixtures\EventFixture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager) : void {
        $eventFixture = new EventFixture();

        /** Events*/
        $eventsData = $eventFixture->getEventsData();
        foreach ($eventsData as $event) {
           $event = $eventFixture->prepareEvent($event);
           $manager->persist($event);
        }

        

        /**Flush */
        $manager->flush();
    }
}

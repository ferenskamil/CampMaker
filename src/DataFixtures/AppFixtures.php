<?php

namespace App\DataFixtures;

use App\Entity\Event;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /** Prepare events fixtures */
        $eventsData = $this->getEventsData();
        foreach ($eventsData as $event) {
           $event = $this->prepareEvent($event);
           $manager->persist($event);
        }

        $manager->flush();
    }

    private function prepareEvent(array $eventData) : Event {
        $event = new Event();
        $event->setTitle($eventData['title']);
        $event->setTermFrom($eventData['termFrom']);
        $event->setTermTo($eventData['termTo']);
        $event->setLocality($eventData['locality']);
        $event->setPrice($eventData['price']);
        $event->setDescription($eventData['description']);

        return $event;
    }

    private function getEventsData() : array {
        return [
            [
                'title' => 'To moje pierwsze wakacje',
                'termFrom' => (new DateTime("2023-06-30")),
                'termTo' => (new DateTime("2023-07-08")),
                'locality' => 'Nad morzem',
                'price' => 3000.45,
                'description' => "Zapraszamy na wspaniałą przygodę...Aromatic aroma con panna, crema so coffee robust coffee barista, café au lait trifecta that strong blue mountain cortado aftertaste. Aroma extraction french press, skinny sweet, blue mountain cup roast barista, beans, extra cappuccino mug crema strong. Americano caffeine white, con panna saucer sit, con panna eu, carajillo aftertaste kopi-luwak, body aftertaste cup single origin café au lait saucer. Macchiato java sweet arabica, turkish cup, eu flavour mug extraction white cortado saucer est white brewed instant, rich, barista breve cappuccino barista organic. Barista, beans extraction, barista mocha, roast steamed siphon cup sweet cortado, cinnamon froth milk ristretto cortado galão. Crema, milk extra brewed, lungo dripper, espresso flavour qui, variety, grinder caramelization sit, strong turkish espresso body, filter barista caramelization half and half strong. To go viennese cream to go, flavour, so mocha as, carajillo iced et a siphon froth. Aged, eu, cup, brewed aroma kopi-luwak, coffee, id viennese french press brewed grounds acerbic froth. Decaffeinated acerbic, spoon beans seasonal, french press café au lait mazagran roast chicory, pumpkin spice galão as fair trade, dark irish cup ristretto half and half whipped shop. Latte instant black extra aroma, instant, extra robusta variety skinny shop aged cup ristretto foam cortado. Bar galão skinny saucer est affogato sugar caffeine chicory sugar coffee, seasonal barista french press acerbic in chicory robust."
            ],
            [
                'title' => 'Dziewicza przygoda w lesie ',
                'termFrom' => (new DateTime("2023-07-01")),
                'termTo' => (new DateTime("2023-07-15")),
                'locality' => 'Puszcza białowieska',
                'price' => 2999,
                'description' => "Zapraszamy na wspaniałą przygodę...Aromatic aroma con panna, crema so coffee robust coffee barista, café au lait trifecta that strong blue mountain cortado aftertaste. Aroma extraction french press, skinny sweet, blue mountain cup roast barista, beans, extra cappuccino mug crema strong. Americano caffeine white, con panna saucer sit, con panna eu, carajillo aftertaste kopi-luwak, body aftertaste cup single origin café au lait saucer. Macchiato java sweet arabica, turkish cup, eu flavour mug extraction white cortado saucer est white brewed instant, rich, barista breve cappuccino barista organic. Barista, beans extraction, barista mocha, roast steamed siphon cup sweet cortado, cinnamon froth milk ristretto cortado galão. Crema, milk extra brewed, lungo dripper, espresso flavour qui, variety, grinder caramelization sit, strong turkish espresso body, filter barista caramelization half and half strong. To go viennese cream to go, flavour, so mocha as, carajillo iced et a siphon froth. Aged, eu, cup, brewed aroma kopi-luwak, coffee, id viennese french press brewed grounds acerbic froth. Decaffeinated acerbic, spoon beans seasonal, french press café au lait mazagran roast chicory, pumpkin spice galão as fair trade, dark irish cup ristretto half and half whipped shop. Latte instant black extra aroma, instant, extra robusta variety skinny shop aged cup ristretto foam cortado. Bar galão skinny saucer est affogato sugar caffeine chicory sugar coffee, seasonal barista french press acerbic in chicory robust."
            ],
        ];
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Event;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventFixture extends Fixture
{
    public function load(ObjectManager $manager) : void
    {
        $event = new Event();
        $event->setTitle("Test title");
        $event->setTermFrom(new DateTime("2023-01-02"));
        $event->setTermTo(new DateTime("2023-01-10"));
        $event->setLocality("Your City");
        $event->setPrice(1000.99);
        $event->setDescription("Zapraszamy na wspaniałą przygodę...Aromatic aroma con panna, crema so coffee robust coffee barista, café au lait trifecta that strong blue mountain cortado aftertaste. Aroma extraction french press, skinny sweet, blue mountain cup roast barista, beans, extra cappuccino mug crema strong. Americano caffeine white, con panna saucer sit, con panna eu, carajillo aftertaste kopi-luwak, body aftertaste cup single origin café au lait saucer. Macchiato java sweet arabica, turkish cup, eu flavour mug extraction white cortado saucer est white brewed instant, rich, barista breve cappuccino barista organic. Barista, beans extraction, barista mocha, roast steamed siphon cup sweet cortado, cinnamon froth milk ristretto cortado galão. Crema, milk extra brewed, lungo dripper, espresso flavour qui, variety, grinder caramelization sit, strong turkish espresso body, filter barista caramelization half and half strong. To go viennese cream to go, flavour, so mocha as, carajillo iced et a siphon froth. Aged, eu, cup, brewed aroma kopi-luwak, coffee, id viennese french press brewed grounds acerbic froth. Decaffeinated acerbic, spoon beans seasonal, french press café au lait mazagran roast chicory, pumpkin spice galão as fair trade, dark irish cup ristretto half and half whipped shop. Latte instant black extra aroma, instant, extra robusta variety skinny shop aged cup ristretto foam cortado. Bar galão skinny saucer est affogato sugar caffeine chicory sugar coffee, seasonal barista french press acerbic in chicory robust.");

        $manager->persist($event);
        $manager->flush();
    }
}
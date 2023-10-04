<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Service\EventProvider;
use App\Entity\Event;
use App\Repository\EventRepository;
use SebastianBergmann\Type\VoidType;


final class EventProviderTest extends TestCase
{

    public function testGetPreparedAllEvents() : void
    {
        $event = new Event();
        $event->setTitle("Test title");
        $event->setTermFrom(new DateTime("2023-01-02"));
        $event->setTermTo(new DateTime("2023-01-10"));
        $event->setLocality("Your City");
        $event->setPrice(1000.99);
        $event->setDescription("Zapraszamy na wspaniałą przygodę...Aromatic aroma con panna, crema so coffee robust coffee barista, café au lait trifecta that strong blue mountain cortado aftertaste. Aroma extraction french press, skinny sweet, blue mountain cup roast barista, beans, extra cappuccino mug crema strong. Americano caffeine white, con panna saucer sit, con panna eu, carajillo aftertaste kopi-luwak, body aftertaste cup single origin café au lait saucer. Macchiato java sweet arabica, turkish cup, eu flavour mug extraction white cortado saucer est white brewed instant, rich, barista breve cappuccino barista organic. Barista, beans extraction, barista mocha, roast steamed siphon cup sweet cortado, cinnamon froth milk ristretto cortado galão. Crema, milk extra brewed, lungo dripper, espresso flavour qui, variety, grinder caramelization sit, strong turkish espresso body, filter barista caramelization half and half strong. To go viennese cream to go, flavour, so mocha as, carajillo iced et a siphon froth. Aged, eu, cup, brewed aroma kopi-luwak, coffee, id viennese french press brewed grounds acerbic froth. Decaffeinated acerbic, spoon beans seasonal, french press café au lait mazagran roast chicory, pumpkin spice galão as fair trade, dark irish cup ristretto half and half whipped shop. Latte instant black extra aroma, instant, extra robusta variety skinny shop aged cup ristretto foam cortado. Bar galão skinny saucer est affogato sugar caffeine chicory sugar coffee, seasonal barista french press acerbic in chicory robust.");

        $eventRepository = $this->createMock(EventRepository::class);

        $eventRepository->expects($this->once())->method('findAll')->willReturn([
            $this->createEventMock(),
            $this->createEventMock(),
            $this->createEventMock()
        ]);

        $eventProvider = new EventProvider($eventRepository);

        $resultEvents = $eventProvider->getPreparedAllEvents();
        foreach ($resultEvents as $event) {
            $this->assertIsArray($event);
            $this->assertArrayHasKey('title', $event);
            $this->assertArrayHasKey('termFrom', $event);
            $this->assertArrayHasKey('termTo', $event);
            $this->assertArrayHasKey('locality', $event);
            $this->assertArrayHasKey('price', $event);
            $this->assertArrayHasKey('description', $event);
        }
    }

    public function testPrepareEvent(): void
    {
        $eventRepository = $this->createMock(EventRepository::class);
        $event = $this->createEventMock();
        $eventProvider = new EventProvider($eventRepository);

        $result1 = $eventProvider->prepareEvent($event);

        $this->assertIsArray($result1);
    }

    public function testDescriptionShortenLength() : void
    {
        $eventRepository = $this->createMock(EventRepository::class);
        $event = $this->createEventMock();
        $eventProvider = new EventProvider($eventRepository);

        $result2 = $eventProvider->prepareEvent($event, true);

        $expectedResult2Length = 300;
        $resultDescriptionLength = strlen($result2['description']);
        $this->assertEquals($expectedResult2Length, $resultDescriptionLength);
    }

    public function createEventMock() : Event
    {
        $event = $this->createMock(Event::class);
        $event->expects($this->once())->method('getTitle')->willReturn('John Doe');
        $event->expects($this->once())->method('getTermFrom')->willReturn(new DateTime("2023-01-02"));
        $event->expects($this->once())->method('getTermTo')->willReturn(new DateTime("2023-01-10"));
        $event->expects($this->once())->method('getLocality')->willReturn('YourCity');
        $event->expects($this->once())->method('getDescription')->willReturn("Zapraszamy na wspaniałą przygodę...Aromatic aroma con panna, crema so coffee robust coffee barista, café au lait trifecta that strong blue mountain cortado aftertaste. Aroma extraction french press, skinny sweet, blue mountain cup roast barista, beans, extra cappuccino mug crema strong. Americano caffeine white, con panna saucer sit, con panna eu, carajillo aftertaste kopi-luwak, body aftertaste cup single origin café au lait saucer. Macchiato java sweet arabica, turkish cup, eu flavour mug extraction white cortado saucer est white brewed instant, rich, barista breve cappuccino barista organic. Barista, beans extraction, barista mocha, roast steamed siphon cup sweet cortado, cinnamon froth milk ristretto cortado galão. Crema, milk extra brewed, lungo dripper, espresso flavour qui, variety, grinder caramelization sit, strong turkish espresso body, filter barista caramelization half and half strong. To go viennese cream to go, flavour, so mocha as, carajillo iced et a siphon froth. Aged, eu, cup, brewed aroma kopi-luwak, coffee, id viennese french press brewed grounds acerbic froth. Decaffeinated acerbic, spoon beans seasonal, french press café au lait mazagran roast chicory, pumpkin spice galão as fair trade, dark irish cup ristretto half and half whipped shop. Latte instant black extra aroma, instant, extra robusta variety skinny shop aged cup ristretto foam cortado. Bar galão skinny saucer est affogato sugar caffeine chicory sugar coffee, seasonal barista french press acerbic in chicory robust.");

        return $event;
    }
}
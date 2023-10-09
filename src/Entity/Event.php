<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $term_from = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $term_to = null;

    #[ORM\Column(length: 255)]
    private ?string $locality = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    private ?Organizer $organizer = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: TripRegistration::class)]
    private Collection $tripRegistrations;

    public function __construct()
    {
        $this->tripRegistrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTermFrom(): ?\DateTimeInterface
    {
        return $this->term_from;
    }

    public function setTermFrom(\DateTimeInterface $term_from): static
    {
        $this->term_from = $term_from;

        return $this;
    }

    public function getTermTo(): ?\DateTimeInterface
    {
        return $this->term_to;
    }

    public function setTermTo(\DateTimeInterface $term_to): static
    {
        $this->term_to = $term_to;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(string $locality): static
    {
        $this->locality = $locality;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getOrganizer(): ?Organizer
    {
        return $this->organizer;
    }

    public function setOrganizer(?Organizer $organizer): static
    {
        $this->organizer = $organizer;

        return $this;
    }

    /**
     * @return Collection<int, TripRegistration>
     */
    public function getTripRegistrations(): Collection
    {
        return $this->tripRegistrations;
    }

    public function addTripRegistration(TripRegistration $tripRegistration): static
    {
        if (!$this->tripRegistrations->contains($tripRegistration)) {
            $this->tripRegistrations->add($tripRegistration);
            $tripRegistration->setEvent($this);
        }

        return $this;
    }

    public function removeTripRegistration(TripRegistration $tripRegistration): static
    {
        if ($this->tripRegistrations->removeElement($tripRegistration)) {
            // set the owning side to null (unless already changed)
            if ($tripRegistration->getEvent() === $this) {
                $tripRegistration->setEvent(null);
            }
        }

        return $this;
    }
}

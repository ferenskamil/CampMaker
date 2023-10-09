<?php

namespace App\Entity;

use App\Repository\TripRegistrationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TripRegistrationRepository::class)]
class TripRegistration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $participantName = null;

    #[ORM\Column(length: 50)]
    private ?string $participantSurname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\Column(length: 50)]
    private ?string $parentPhone = null;

    #[ORM\Column(nullable: true)]
    private ?bool $acceptanceOfStatement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParticipantName(): ?string
    {
        return $this->participantName;
    }

    public function setParticipantName(string $participantName): static
    {
        $this->participantName = $participantName;

        return $this;
    }

    public function getParticipantSurname(): ?string
    {
        return $this->participantSurname;
    }

    public function setParticipantSurname(string $participantSurname): static
    {
        $this->participantSurname = $participantSurname;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getParentPhone(): ?string
    {
        return $this->parentPhone;
    }

    public function setParentPhone(string $parentPhone): static
    {
        $this->parentPhone = $parentPhone;

        return $this;
    }

    public function isAcceptanceOfStatement(): ?bool
    {
        return $this->acceptanceOfStatement;
    }

    public function setAcceptanceOfStatement(?bool $acceptanceOfStatement): static
    {
        $this->acceptanceOfStatement = $acceptanceOfStatement;

        return $this;
    }
}

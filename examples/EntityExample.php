<?php

namespace Ydee\PhoneNumberBundle\Examples;

use Doctrine\ORM\Mapping as ORM;
use Ydee\PhoneNumberBundle\Validator\Constraints\PhoneNumber;

/**
 * Example entity showing how to use the PhoneNumber constraint
 */
#[ORM\Entity]
class EntityExample
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    #[PhoneNumber(region: 'FR', message: 'Please enter a valid French phone number.')]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 20)]
    #[PhoneNumber(message: 'Please enter a valid international phone number.')]
    private ?string $internationalPhone = null;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getInternationalPhone(): ?string
    {
        return $this->internationalPhone;
    }

    public function setInternationalPhone(?string $internationalPhone): static
    {
        $this->internationalPhone = $internationalPhone;
        return $this;
    }
} 
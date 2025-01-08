<?php
// Entities/Persoon.php

declare(strict_types=1);

class Persoon
{
    private int $persoonID;
    private string $voornaam;
    private string $familienaam;

    // Persoon constructor.
    public function __construct(int $persoonID, string $voornaam, string $familienaam)
    {
        $this->persoonID = $persoonID;
        $this->voornaam = $voornaam;
        $this->familienaam = $familienaam;
    }

    // Get the person's ID.
    public function getId(): int
    {
        return $this->persoonID;
    }

    // Get the person's full name.
    public function getNaam(): string
    {
        return $this->voornaam . ' ' . $this->familienaam;
    }
}

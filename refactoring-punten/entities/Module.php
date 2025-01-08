<?php
// Entities/Module.php

declare(strict_types=1);

class Module
{
    private int $moduleID;
    private string $naam;

    // Module constructor.
    public function __construct(int $moduleID, string $naam)
    {
        $this->moduleID = $moduleID;
        $this->naam = $naam;
    }

    // Get the module's ID.
    public function getId(): int
    {
        return $this->moduleID;
    }

    // Get the module's name. 
    public function getNaam(): string
    {
        return $this->naam;
    }
}

<?php
// Entities/Punten.php

declare(strict_types=1);

class Punten
{
    private int $moduleID;
    private int $persoonID;
    private int $punt;

    // Punten constructor.
    public function __construct(int $moduleID, int $persoonID, int $punt)
    {
        $this->moduleID = $moduleID;
        $this->persoonID = $persoonID;
        $this->punt = $punt;
    }

    // Get the module's ID.
    public function getModuleID(): int
    {
        return $this->moduleID;
    }

    // Get the person's ID.
    public function getPersoonID(): int
    {
        return $this->persoonID;
    }

    // Get the point value.
    public function getPunt(): int
    {
        return $this->punt;
    }
}

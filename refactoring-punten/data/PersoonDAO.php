<?php
// Data/PersoonDAO.php

declare(strict_types=1);

require_once __DIR__ . '/../Entities/Personen.php';


class PersoonDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    //Haalt alle personen op uit de database.
    public function getAllPersonen(): array
    {
        $personen = [];
        $query = "SELECT id, voornaam, familienaam FROM personen";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $personen[] = new Persoon(
                    (int)$row['id'],
                    $row['voornaam'],
                    $row['familienaam']
                );
            }
        } catch (PDOException $e) {
            error_log("Failed to fetch personen: " . $e->getMessage());
            throw $e;
        }

        return $personen;
    }

    // Andere CRUD-methoden kunnen hier worden toegevoegd
}

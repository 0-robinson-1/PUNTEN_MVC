<?php

declare(strict_types=1);

require_once 'Entities/Persoon.php';

class PersoonHandler
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Haalt alle personen op uit de database.
     *
     * @return Persoon[] Een array van Persoon objecten.
     */
    public function getAllPersonen(): array
    {
        $sql = 'SELECT id, voornaam, familienaam, email FROM personen';
        $personen = [];
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $personen[] = new Persoon(
                    (int)$row['id'],
                    $row['voornaam'],
                    $row['familienaam'],
                    $row['email']
                );
            }
        } catch (PDOException $e) {
            error_log("Failed to fetch personen: " . $e->getMessage());
        }

        return $personen;
    }

    // Andere CRUD-methoden kunnen hier worden toegevoegd
}
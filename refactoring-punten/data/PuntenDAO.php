<?php
// Data/PuntenDAO.php

declare(strict_types=1);

require_once __DIR__ . '/../Entities/Punten.php';

class PuntenDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Voegt punten toe voor een persoon en module.
    public function voegPuntenToe(int $persoonId, int $moduleId, int $punt): bool
    {
        $query = "INSERT INTO punten (module_id, persoon_id, punt) VALUES (:module_id, :persoon_id, :punt)";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':module_id', $moduleId, PDO::PARAM_INT);
            $stmt->bindParam(':persoon_id', $persoonId, PDO::PARAM_INT);
            $stmt->bindParam(':punt', $punt, PDO::PARAM_INT);

            $result = $stmt->execute();
            if ($result) {
                error_log("Punten succesvol toegevoegd: persoon_id=$persoonId, module_id=$moduleId, punt=$punt.");
            } else {
                error_log("Punten toevoegen mislukt: persoon_id=$persoonId, module_id=$moduleId, punt=$punt.");
            }
            return $result;
        } catch (PDOException $e) {
            error_log("Failed to voegPuntenToe: " . $e->getMessage());
            return false;
        }
    }

    // Haalt alle punten op met bijbehorende persoon en module details.
    public function getAllPuntenMetDetails(): array
    {
        $query = "
            SELECT 
                p.id AS punt_id, 
                p.punt, 
                p.module_id, 
                m.naam AS module_naam, 
                p.persoon_id, 
                pe.voornaam, 
                pe.familienaam
            FROM punten p
            JOIN modules m ON p.module_id = m.id
            JOIN personen pe ON p.persoon_id = pe.id
            ORDER BY p.id DESC
        ";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $puntenMetDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $puntenMetDetails;
        } catch (PDOException $e) {
            error_log("Failed to getAllPuntenMetDetails: " . $e->getMessage());
            return [];
        }
    }

    // Andere CRUD-methoden kunnen hier worden toegevoegd
}

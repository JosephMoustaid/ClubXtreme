<?php
declare(strict_types=1);

class Evenement
{
    private string $nom;
    private DateTime $date;
    private string $lieu;
    private string $description;
    private array $participants = array();

    public function __construct(string $nom, DateTime $date, string $lieu, string $description , array $participants)
    {
        $this->nom = $nom;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->description = $description;
        $this->participants = $participants;
    }

    // Getter functions
    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function ajouterParticipant(Membre $membre): bool
    {
        // TODO implement here
        return true;
    }

    public function supprimerParticipant(Membre $membre): bool
    {
        // TODO implement here
        return true;
    }
}
?>

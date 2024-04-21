<?php
declare(strict_types=1);

class Rapport
{
    private DateTime $date;
    private string $contenu;
    private Utilisateur $auteur;
    private array $destinataire = array();

    public function __construct(DateTime $date, string $contenu, Utilisateur $auteur)
    {
        $this->date = $date;
        $this->contenu = $contenu;
        $this->auteur = $auteur;
    }

    // Getter methods
    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getAuteur(): Utilisateur
    {
        return $this->auteur;
    }

    public function getDestinataire(): array
    {
        return $this->destinataire;
    }

    public function ajouterDestinataire(Utilisateur $destinataire): void
    {
        // TODO implement here
    }

    public function supprimerDestinataire(Utilisateur $destinataire): void
    {
        // TODO implement here
    }
}
?>

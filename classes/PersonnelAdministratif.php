<?php
declare(strict_types=1);

class PersonnelAdministratif extends Utilisateur
{
    private string $fonction;
    private DateTime $dateEmbauche;
    private float $salaire;

    public function __construct(string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone, string $fonction, DateTime $dateEmbauche, float $salaire)
    {
        parent::__construct($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $this->fonction = $fonction;
        $this->dateEmbauche = $dateEmbauche;
        $this->salaire = $salaire;
    }

    // Getter methods
    public function getFonction(): string
    {
        return $this->fonction;
    }

    public function getDateEmbauche(): DateTime
    {
        return $this->dateEmbauche;
    }

    public function getSalaire(): float
    {
        return $this->salaire;
    }

    public function modifierFonction(string $nouvelleFonction): void
    {
        // TODO implement here
    }

    public function ajouterMembre(Membre $membre): void
    {
        // TODO implement here
    }

    public function supprimerMembre(Membre $membre): void
    {
        // TODO implement here
    }

    public function enregistrerTransaction(Transaction $transaction): bool
    {
        // TODO implement here
        return false;
    }
}
?>

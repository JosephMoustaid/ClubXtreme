<?php
declare(strict_types=1);

class Admin extends PersonnelAdministratif
{
    public function __construct(string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone, string $fonction, DateTime $dateEmbauche, float $salaire)
    {
        parent::__construct($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone, $fonction, $dateEmbauche, $salaire);
    }

    public function ajouterEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function supprimerEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function modifierEvenement(Evenement $evenement): void
    {
        // TODO implement here
    }

    public function ajouterEntraineur(Entraineur $entraineur): void
    {
        // TODO implement here
    }

    public function supprimerEntraineur(Entraineur $entraineur): void
    {
        // TODO implement here
    }
}
?>

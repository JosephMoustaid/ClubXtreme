<?php
declare(strict_types=1);

class Entraineur extends Utilisateur
{
    private string $specialite;
    private string $niveauQualification;

    public function __construct(string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone, string $specialite, string $niveauQualification)
    {
        parent::__construct($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
        $this->specialite = $specialite;
        $this->niveauQualification = $niveauQualification;
    }

    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    public function getNiveauQualification(): string // Corrected method name
    {
        return $this->niveauQualification;
    }

    public function planifierSeanceEntrainement(DateTime $date, string $lieu): void
    {
        // TODO: Implement method
    }

    public function evaluerMembre(Membre $membre): string
    {
        // TODO: Implement method
        return "Evaluation";
    }
}
?>


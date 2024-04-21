<?php
declare(strict_types=1);

class SceanceEntrainement
{
    private DateTime $date;
    private string $lieu;
    private string $exercices ;
    private Entraineur $entraineur;

    public function __construct(DateTime $date, string $lieu, Entraineur $entraineur, string $exercices)
    {
        $this->date = $date;
        $this->lieu = $lieu;
        $this->entraineur = $entraineur;
        $this->exercices = $exercices;
    }

    // Getter methods
    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }

    public function getExercices(): string
    {
        return $this->exercices;
    }

    public function getEntraineur(): Entraineur
    {
        return $this->entraineur;
    }

    public function ajouterExercice(string $exercice): void
    {
        // TODO implement here
    }

    public function supprimerExercice(string $exercice): void
    {
        // TODO implement here
    }
}
?>


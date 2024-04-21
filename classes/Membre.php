<?php

declare(strict_types=1);


class Membre extends Utilisateur
{
    public function __construct(string $nom, string $prenom, string $email, string $motDePasse, DateTime $dateDeNaissance, string $numDeTelephone)
    {
        parent::__construct($nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);
    }
    public function participerEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return ;
    }

    /**
     * @param Evenement $evenement 
     * @return void
     */
    public function annulerParticipationEvenement(Evenement $evenement): void
    {
        // TODO implement here
        return ;
    }

    /**
     * @return Evaluation
     */
    public function evaluerProgression(): string
    {
        // TODO implement here
        return "Evaluation";
    }

}

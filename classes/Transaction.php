<?php
declare(strict_types=1);

class Transaction
{
    private int $id;
    private float $montant;
    public Membre $membre;
    private DateTime $date;
    private string $methode;
    private string $statut;
    public string $type;

    public function __construct(int $id, float $montant, Membre $membre ,DateTime $date, string $methode, string $statut, string $type)
    {
        $this->id = $id;
        $this->montant = $montant;
        $this->membre =  $membre;
        $this->date = $date;
        $this->methode = $methode;
        $this->statut = $statut;
        $this->type = $type;
    }

    // Getter methods
    public function getId(): int
    {
        return $this->id;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getMethode(): string
    {
        return $this->methode;
    }

    public function getMembre(): Membre
    {
        return $this->membre;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function effectuerPaiememnt(float $montant, string $methodePaiement): void
    {
        // TODO implement here
    }

    public function annulerPaiement(): void
    {
        // TODO implement here
    }
}
?>

<?php

class Product
{
    public int $id;
    public string $nom;
    public string $description;
    public float $prix;

    public function __construct(int $id, string $nom, string $description, float $prix)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
    }
}

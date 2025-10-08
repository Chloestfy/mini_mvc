<?php
class User
{
    public int $id;
    public string $nom;
    public string $prenom;

    public function __construct(int $id, string $nom, string $prenom)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}

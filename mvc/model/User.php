<?php

class User
{
    public int $id;
    public string $nom;
    public string   $prenom;

    public function __construct($id, $nom, $prenom)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}

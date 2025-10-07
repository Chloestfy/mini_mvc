<?php

class UserDao
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM User";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        $users = [];
        foreach ($data as  $user) {
            $user = new User($user["id"], $user["nom"], $user["prenom"]);
            $users[] = $user;
        }
        return $users;
    }
    public function getUserById(int $id): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if ($data) {
            return new User($data['id'], $data['nom'], $data['prenom']);
        }
        return null;
    }
}

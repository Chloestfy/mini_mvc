<?php
require_once __DIR__ . '/../User.php';

class UserDao
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllUsers(): array
    {
        $query = "SELECT * FROM user";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($data as $user) {
            $users[] = new User($user["id"], $user["nom"], $user["prenom"]);
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

    public function deleteUserById(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM user WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function insertUser(string $nom, string $prenom): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (nom, prenom) VALUES (?, ?)");
        return $stmt->execute([$nom, $prenom]);
    }
}

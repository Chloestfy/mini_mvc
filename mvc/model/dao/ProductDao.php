<?php
class ProductDao
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function mapRowToProduct(array $row): Product
    {
        return new Product(
            (int)$row['id'],
            $row['nom'],
            $row['description'],
            (float)$row['pix'] // Utilise 'pix' ici
        );
    }

    public function getAllProducts(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM product");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map([$this, 'mapRowToProduct'], $rows);
    }

    public function getProductById(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->mapRowToProduct($row) : null;
    }

    public function deleteProductById(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM product WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function insertProduct(string $nom, string $description, float $pix): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO product (nom, description, pix) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $description, $pix]);
    }
}

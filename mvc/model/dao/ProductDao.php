<?php

class ProductDao
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllProducts(): array
    {
        $query = "SELECT * FROM product";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        foreach ($data as $row) {
            $id = (int)($row['id'] ?? 0);
            $nom = $row['nom'] ?? ($row['name'] ?? 'Produit sans nom');
            $description = $row['description'] ?? '';
            $prix = 0.0;
            if (!empty($row['pix'])) {
                $prix = (float)$row['pix'];
            } elseif (!empty($row['prix'])) {
                $prix = (float)$row['prix'];
            } elseif (!empty($row['price'])) {
                $prix = (float)$row['price'];
            }

            $product = new Product($id, $nom, $description, $prix);
            $products[] = $product;
        }

        return $products;
    }

    public function getProductById(int $id): ?Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $id = (int)($row['id'] ?? 0);
            $nom = $row['nom'] ?? ($row['name'] ?? 'Produit sans nom');
            $description = $row['description'] ?? '';
            $prix = 0.0;
            if (!empty($row['pix'])) {
                $prix = (float)$row['pix'];
            } elseif (!empty($row['prix'])) {
                $prix = (float)$row['prix'];
            } elseif (!empty($row['price'])) {
                $prix = (float)$row['price'];
            }

            return new Product($id, $nom, $description, $prix);
        }

        return null;
    }
}

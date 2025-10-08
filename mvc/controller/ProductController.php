<?php
require_once __DIR__ . '/../model/dao/ProductDao.php';
require_once __DIR__ . '/../model/Product.php';

class ProductController
{
    private ProductDao $productDao;

    public function __construct(ProductDao $productDao)
    {
        $this->productDao = $productDao;
    }

    public function displayProductList()
    {
        $products = $this->productDao->getAllProducts();
        require_once __DIR__ . '/../view/productListView.php';
    }

    public function displayProduct(int $id)
    {
        $product = $this->productDao->getProductById($id);
        if (!$product) {
            echo "Produit non trouvé.";
            return;
        }
        require_once __DIR__ . '/../view/productView.php';
    }

    public function deleteProduct(int $id)
    {
        $success = $this->productDao->deleteProductById($id);
        if ($success) {
            echo "Produit supprimé avec succès.<br>";
        } else {
            echo "Erreur lors de la suppression.<br>";
        }
        $this->displayProductList();
    }
    public function addProduct(array $data)
    {
        $nom = trim($data['nom']);
        $description = trim($data['description']);
        $prix = (float)$data['prix'];

        if ($nom && $description && $prix > 0) {
            $this->productDao->insertProduct($nom, $description, $prix);
            echo "Produit ajouté avec succès.<br>";
        } else {
            echo " Données invalides.";
        }

        $this->displayProductList();
    }
}

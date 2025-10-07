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
}




// require_once __DIR__ . '/../model/Product.php';

// class ProductController
// {
//     private ProductDao $productDao;

//     public function __construct(ProductDao $productDao)
//     {
//         $this->productDao = $productDao;
//     }

//     public function displayAllProducts(): void
//     {
//         $products = $this->productDao->getAllProducts();
//         require_once __DIR__ . '/../view/productView.php';
//     }

//     public function showProduct(): void
//     {
//         // Ici tu pourrais récupérer un produit spécifique si besoin
//         require_once __DIR__ . '/../view/productView.php';
//     }
// }

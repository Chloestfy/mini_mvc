<?php
require_once __DIR__ . '/../model/Product.php';

class ProductController
{
    public function showProduct()
    {
        $product = new Product("Lampe de bureau", 29.99);
        require __DIR__ . '/../view/productView.php';
    }

    public function showProductList()
    {
        $products = [
            new Product("Lampe de bureau", 29.99),
            new Product("Clavier mécanique", 89.99),
            new Product("Écran 27 pouces", 199.99)
        ];

        require __DIR__ . '/../view/productListView.php';
    }
}

<?php
require_once __DIR__ . '/../model/Product.php';


class ProductController
{
    public function showProduct()
    {
        $product = new Product("Chaussures", 59.99);
    }


    public function showProductList()
    {
        $products = [
            new Product("Chaussures", 59.99),
            new Product("T-shirt", 19.99),
            new Product("Jean", 39.99)
        ];
        require_once __DIR__ . '/../view/productListView.php';
    }
}

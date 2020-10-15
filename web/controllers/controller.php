<?php

require('./models/model.php');

function listProducts() {
    $products = getProducts();
    echo("products : ");
    var_dump($products);

    //require('listProductsView.php');
}

function displayProduct($id) {
    $product = getProduct($id);
    echo("product : ");
    var_dump($product);

    //require('displayProductView.php');
}
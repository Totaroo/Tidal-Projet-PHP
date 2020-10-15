<?php

require('./models/model.php');

function listProducts() {
    $products = allProducts();
    echo("products : ");

    

    $Number = countAllProducts($db) ;

    var_dump($Number);
    
    /*
    for ($i=0; $i < productsLength; $i++) { 
        var_dump($products[$i]);
    }*/
    

    //require('listProductsView.php');
}

function displayProduct($id) {
    $product = getProduct($id);
    echo("product : ");
    var_dump($product);

    //require('displayProductView.php');
}
<?php

require('./models/model.php');

function displayAllProducts() {
        
    $products = GetAllProducts();

    //var_dump($products);

    foreach($products as $item){
        echo("products : ");
        var_dump($item);
        echo "<br><br>";
    }

}

function displayProduct($id) {
    $product = getProduct($id);
    echo("product : ");
    var_dump($product);

    //require('displayProductView.php');
}

function displayBasket($customerId) {
    $basket = getBasket($customerId);

    foreach($basket as $item){
        echo("products : ");
        var_dump($item);
        echo "<br><br>";
    }

    //require('displayProductView.php');
}
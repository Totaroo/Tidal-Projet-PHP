<?php

require('./models/model.php');

//permet le transfert de la session entre les pages
session_start();


function displayAllProducts() {
        
    $products = GetAllProducts();

    foreach($products as $item){
        echo("products : ");
        var_dump($item);
        echo "<br>";
    }

}

function displayProduct($id) {
    $product = getProduct($id);
    echo("product : ");
    var_dump($product);
}

function displayBasket($customerId) {
    $basket = getBasket($customerId);

    foreach($basket as $item){
        echo("products : ");
        var_dump($item);
    }
}



<?php

//fichier de paramètre
require('./models/model.php');


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

function disconnect(){
    session_start();
    session_destroy();
    // Redirect to the login page:
    header('Location: index.html');
}



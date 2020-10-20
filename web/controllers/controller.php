<?php

require('./models/model.php');

function listAllProducts() {
        
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
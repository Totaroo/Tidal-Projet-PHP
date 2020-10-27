<?php

//fichier de paramètre
require('./models/model.php');
include('../Config/init.php');
//require('../libs/Smarty.class.php');



function displayAllProducts() {
        
    $products = GetAllProducts();

    foreach($products as $item){
        //var_dump($item);

        $smarty = new Smarty() ;
        $smarty->assign('product', $item );
        $smarty->display('./views/homeProduct.tpl');

        echo "<br><br><br>";
    }

}

function displayProduct($id) {
    $product = getProduct($id);
    echo("product : ");
    var_dump($product);
}

function displayCart($customerId) {
    $cart = getCart($customerId);

    foreach($cart as $item){
        echo("products : ");
        var_dump($item);
    }
}


function addToCart() {
    //
}

//gestion des utilisateurs

function disconnect(){
    session_start();
    session_destroy();
}

//event listeners

if(isset($_POST['disconnectButton'])) { 
    disconnect();
} 


if(isset($_POST['addToCartButton'])) { 

} 
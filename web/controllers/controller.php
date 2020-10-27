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

function displayCart() {

    //On stock en local le panier
    if (isset($_SESSION['loggedin'])) {

        $customerId = $_SESSION["id"];
        // Chaque panier est unique et correspond a l'id du client

        $_SESSION['cart'] = getCart($customerId);
        //var_dump( getCart($customerId) );
    }
    
    $cart = $_SESSION['cart'];

    foreach($cart as $item){
        echo("Votre panier : ");
        var_dump($item);
        echo "<br><br>";
    }
}


function addToCart($id, $value) {
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
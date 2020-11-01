<?php

//fichier de paramètre
require('./models/model.php');
include('../Config/init.php');
//require('../libs/Smarty.class.php');
session_start();

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
    //echo("product : ");
    //var_dump($product);
    return($product);
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

   // var_dump($item) ;
    if ($cart == NULL ) {
        echo "Panier vide" ;
    }else {

        foreach($cart as $item){
            echo("Votre panier : ");
            var_dump($item);
            echo "<br><br>";
        }
    }

}



function addToCart($productId , $value) {
    //echo "Add to cart";
    $cart = $_SESSION['cart'];
    //var_dump((int)$productId) ;
       //On stock en local le panier
    if (isset($_SESSION['loggedin'])) {
        $customerId = $_SESSION["id"];
        //var_dump("custid : " , $customerId , $productId ,"value :" , $value, "end") ;
        updateCart($customerId, $productId , $value );
    } else {
        echo "disconnected";
        
        $productExist = 0;


        foreach($cart as $item) {
    
            if ($productId == $item["id"]) {
                //var_dump($item["id"]);
                //$cartId = $item["id"] ;
                echo "Produit existant <br>";
                $item["quantity"] =   $item["quantity"] + value ; 
                $productExist = 1 ;
                break;
            }
    
        }
        if (!$productExist) {
            echo "flag activé" ;

            $product = getProduct($productId);
            $cartItem = array( 'id' => $product[id] , 'name' => $product[name], 'quantity' => $value );
            array_push($cart , $cartItem) ;

            $_SESSION['cart'] = $cart ;
            var_dump($cart);
            //$_SESSION['cart'].append
        }

        //var_dump($product) ;
        echo "<br>" ;
        
        //var_dump($cartItem) ;

    }
    
    
    //permet d'identifier la ligne d'un panier a partir de son id
    
    //mise à jour coté client
    /*foreach($cart as $item) {
    
        if ($productId == $item["id"]) {
            var_dump($item["id"]);
            $cartId = $item["id"] ;
            $item["quantity"] =   $item["quantity"] + value ; 
            break;
        }

    }**/

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
    $productId = $_POST['productId'];
    $value = $_POST['value'];
   // var_dump("event : " , $productId, $value  );
    //echo  "<br>" ;
    addToCart($productId , $value);

} 
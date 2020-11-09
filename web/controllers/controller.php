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
    //On récupère le panier depuis les cookies
    $cart = $_SESSION['cart'];


    //Si l'utilisateur est connecté on utilise les fonction BDD
    if (isset($_SESSION['loggedin'])) {
        $customerId = $_SESSION["id"];
        //var_dump("custid : " , $customerId , $productId ,"value :" , $value, "end") ;
        updateCart($customerId, $productId , $value );
    } 
    else {
        //echo $value;
        
        $productExist = 0;

        $newCart = [];

        foreach($cart as $item) { // verifie si le produit est dans le paniet et l'incrémente si oui
    
            if ($productId == $item["id"]) { 

                //var_dump($item["id"]);
                //$cartId = $item["id"] ;
                echo "Produit existant dans le panier <br>";
                $itemQuantity = $item["quantity"] + $value ; //incrémentation de la quantité associé au produit
                $item["quantity"] =   (string)$itemQuantity;
                
                $productExist = 1 ;
                //var_dump($item);
                
                
            }

            array_push($newCart , $item) ;
            echo "<br>";
    
        }

        //var_dump($newCart);
        
        //var_dump($newCart);

        if (!$productExist) { //cas ou le produit n'est pas dans le panier
            echo "produit non ajouté au panier<br>" ;

            $product = getProduct($productId);
            $cartItem = array( 'id' => $product[id] , 'name' => $product[name], 'quantity' => $value );

            //php ne peut pas push sur un array vide
            if ($cart == null ) {
                echo "cart is null<br>" ;
                $cart = [] ;
            }

            
            array_push($cart , $cartItem) ;

            
            
            $newCart = $cart ;
       
            
            //$_SESSION['cart'].append
        } 
        
        echo "<br>" ;


        $_SESSION['cart'] = $newCart;
 
        
        
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
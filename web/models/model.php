<?php

// Connexion a la base de données
function dbConnect() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=webapp","debian-sys-maint","aR7RIRZbiUZw3dYk");
        return $db;

    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}



function GetAllProducts() {

    $db = dbConnect();

    
    $req = $db->prepare('SELECT id, name, description, price FROM Products ORDER BY "popularity" ASC');
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    return($result);
}

function getProduct($id) {

    $db = dbConnect();
    $req = $db->prepare("SELECT id, name, description, price FROM Products WHERE id = ?;");
    $req->execute([$id]);
    //var_dump($req->fetch(PDO::FETCH_ASSOC));
    return $req->fetch(PDO::FETCH_ASSOC);
}



function getCart($cartId) {
    $db = dbConnect();

    $req = $db->prepare('SELECT  Products.id, Products.name, BasketItem.quantity
    FROM Products
    JOIN BasketItem ON Products.id = BasketItem.productId
    JOIN Basket ON BasketItem.cartId = Basket.id
    WHERE Basket.id = :id ;');

    $req->bindValue(':id', $cartId, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return($result);
}

function updateCart($cartId, $productId , $quantity ){
    $db = dbConnect();
    // on vérifie d'abord l'existence de l'objet dans le panier
    var_dump("model" , $cartId , $productId , $quantity) ;
    //$req = $db->prepare('UPDATE `BasketItem` SET quantity = quantity + :quantity  WHERE (productId= :productId AND cartId = :cartId);');
    
    
    $req = $db->prepare('INSERT INTO BasketItem (productId, quantity, cartId )
    VALUES(  :productId, 1 , :cartId)
    ON DUPLICATE KEY UPDATE 
    quantity = quantity + :quantity , cartId = 1    ;');


    $req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $req->bindValue(':productId', $productId, PDO::PARAM_INT);
    $req->bindValue(':cartId', $cartId, PDO::PARAM_INT);
    $req->execute();

    
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    return($result);
}


function getUserData($username) {

    $db = dbConnect() ;
    $req = $db->prepare('SELECT id, password FROM `Customers` WHERE ( username=:username )' ) ;
    $req->bindValue(':username', $username, PDO::PARAM_STR);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return ($data);

}

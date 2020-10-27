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
    return $req->fetch();
}



function getCart($cartId) {
    $db = dbConnect();

    $req = $db->prepare('SELECT  Basket.id, Products.name, BasketItem.quantity
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

    $req = $db->prepare('UPDATE `BasketItem` SET quantity = quantity + :quantity  WHERE (productId= :productId AND cartId = :cartId);');
    $req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
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

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


    $req = $db->prepare('SELECT id, name, description, price FROM Products');
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



function getBasket($customerId) {
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM `Basket` WHERE (customer = :id);');
    $req->bindValue(':id', $customerId, PDO::PARAM_INT);
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

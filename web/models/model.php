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
    //return("GetAllProducts");

    return($result);
/*
    while ($row = $req->fetch())
    {
        foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
            echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
        }
        echo "<br><br>";
    }
   */
        //return $req->fetch();
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
    //$req = $db->prepare('SELECT product, quantity, FROM Basket WHERE customer=:customer;');
    $req->bindValue(':id', $customerId, PDO::PARAM_INT);
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    //return("GetAllProducts");
    return($result);
}







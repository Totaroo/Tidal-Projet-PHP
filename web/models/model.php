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

function countAllProducts() {


    $db = dbConnect();

    $nombre = $db->query('SELECT COUNT(*) FROM Products');
    
    return $nombre;
  
        
}


function allProducts() {

    $db = dbConnect();

    $productsNumber = countAllProducts($db);

    $req = $db->query('SELECT id, name, description, price FROM Products');


    while ($row = $req->fetch())
    {

        
    }
   
        return $req->fetch();
}



function getProduct($id) {

    $db = dbConnect();
    $req = $db->prepare("SELECT id, name, description, price FROM Products WHERE id = ?");
    $req->execute([$id]);

    return $req->fetch();
}



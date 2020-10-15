<?php
// C'est ici que nous ferons nos requêtes SQL

function getProducts() {
    try {
        $db = dbConnect();
    } catch (Exception $e) {
        echo"Problème de connexion à la base de données !";
        die();
    }

    $req = $db->query('SELECT id, name, description, price FROM Products');

    return $req->fetch();
}

function getProduct($id) {
    try {
        $db = dbConnect();
    } catch (Exception $e) {
        echo"Problème de connexion à la base de données !";
        die();
    }
/*
    $req = $db->prepare("SELECT id, name, description, price FROM Products WHERE id = ?")
    $req->execute([$id]);

    return $req->fetch();*/
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function dbConnect() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=webapp","debian-sys-maint","aR7RIRZbiUZw3dYk");
        return $db;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}
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


function verifyUser($username, $password) {
    
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
	$_SESSION['name'] = $_POST['username'];
	$_SESSION['id'] = $id;
	echo 'Welcome ' . $_SESSION['name'] . '!';
    //a enlever
    //return(1);

    
    $db = dbConnect();
    

    $req = $db->prepare('SELECT count(*) FROM `Customers` WHERE (username=:username AND password=:password);');

    $req->bindValue(':username', $username, PDO::PARAM_STR);
    $req->bindValue(':password', $password, PDO::PARAM_STR);
    $req->execute();

    return($req);


}


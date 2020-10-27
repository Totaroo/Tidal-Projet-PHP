<?php

require('../models/model.php');
//permet le transfert de l'authentification entre les pages
include('./Config/init.php');

session_start();

//$req = $db->prepare('SELECT count(*) FROM `Customers` WHERE (username=:username AND password=:password);')

if (  isset($_POST['username'], $_POST['password'])  ) {
    $postedUsername =  $_POST['username'] ;

    //on récupère les données depuis le modèle
    $data = getUserData($postedUsername);
    
    // verifie si l'utilisateur existe 
    $num_rows =  count($data) ;
       
    if ( $num_rows > 0 ) {
        echo 'compte existant <br> ';
        $password = ($data[0])['password']  ;
            
        // a noter que le md5 n'est pas fiable
        if ( md5($_POST['password']) ==  $password)  {

            echo 'mdp verifié <br> ';


            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();

            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: /index.php');


        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
            

    } else {
    // Incorrect username
    echo 'Incorrect username // and/or password!';
    }
    $req->close();    

    } else {
    exit('Please fill both the username and password fields!<br>');
}















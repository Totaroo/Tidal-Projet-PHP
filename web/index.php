<?php
session_start();

require('./libs/smarty/Smarty.class.php');
require('./controllers/controller.php');


$smarty = new Smarty() ;
$smarty->display('./views/header.tpl');



// Fonction de routing.
if (isset($_GET['action'])) {

  if ($_GET['action'] == 'listProducts') {
      listProducts();

  }

  elseif ($_GET['action'] == 'displayProduct') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
          displayProduct($_GET['id']);
      }

      else {
          echo 'Erreur : aucun identifiant ID renseigné.';
      }
      
  }
}
else {
  listProducts();
}

/*
try {
    $bdd = new PDO("mysql:host=localhost;dbname=webapp", "debian-sys-maint",  "aR7RIRZbiUZw3dYk");
    $bdd->query("SET NAMES UTF8");
    $products = $bdd->query('SELECT * FROM Products');

  
    // On affiche chaque entrée une à une
  while ( $data = $products->fetch())
  {
    ?>


    <p>
    <strong>Donné : </strong> :
     <?php echo $data['name']; ?>


<?php
  }
   



} catch (Exception $e) {
    echo "Problème de connexion à la base de donnée !";
    die();
}*/


$smarty->display('./views/footer.tpl');




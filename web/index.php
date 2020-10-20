<?php
session_start();

require('./libs/smarty/Smarty.class.php');
require('./controllers/controller.php');


$smarty = new Smarty() ;
$smarty->display('./views/header.tpl');



listAllProducts();

/*
// Fonction de routing.
if (isset($_GET['action'])) {

  if ($_GET['action'] == 'listProducts') {
    listAllProducts();

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
  listAllProducts();
}

*/

$smarty->display('./views/footer.tpl');




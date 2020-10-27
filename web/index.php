<?php

include('./Config/init.php');


$smarty->display('./views/header.tpl');


if (!isset($_SESSION['loggedin'])) {
  $smarty->display('./views/loginForm.tpl');
  
} else {
  echo "<h2>bonjour " . $_SESSION['name'] . " </h2>";

  echo '<form method="post">   <input type="submit" name="disconnectButton"    value="déconnection"/>  </form>';
  
}


displayAllProducts();


//$smarty->display('./views/homeProduct.tpl');




//disconnect();
//displayBasket(1);
//displayProduct(1);



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




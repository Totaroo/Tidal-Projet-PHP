<?php
session_start();

require('./libs/smarty/Smarty.class.php');

$smarty = new Smarty() ;
$smarty->display('./views/header.tpl');


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
   
$data->closeCursor(); // Termine le traitement de la requête


} catch (Exception $e) {
    echo "Problème de connexion à la base de donnée !";
    die('Erreur : '.$e->getMessage());
}





$smarty->display('./views/footer.tpl');



?>
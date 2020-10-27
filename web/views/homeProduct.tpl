<div>


    <h1>{$product.id} : {$product.name}</h1>

    <div>{$product.description}</div>

    <div><h2>Prix : {$product.price} €</h2></div>

    <form action="../controllers/login.php" method="post">
            
        <input type="submit" id="submit" name="addToCartButton" value="+ Ajouter au panier">
             
    </form>
</div>
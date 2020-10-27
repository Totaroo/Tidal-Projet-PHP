<div>


    <h1>{$product.id} : {$product.name}</h1>

    <div>{$product.description}</div>

    <div><h2>Prix : {$product.price} €</h2></div>

    <form method="post">
            
        <input type="hidden" name="value" value=1 >
        <input type="hidden" name="productId" value={$product.id} >
        <input type="submit" id="submit" name="addToCartButton" value="+ Ajouter au panier">
             
    </form>
</div>
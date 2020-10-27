<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-27 12:49:22
  from '/var/www/views/homeProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f981752b37615_79567834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'add717126d7c78bc448b015ba27f360c088ff1f9' => 
    array (
      0 => '/var/www/views/homeProduct.tpl',
      1 => 1603803087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f981752b37615_79567834 (Smarty_Internal_Template $_smarty_tpl) {
?><div>


    <h1><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
 : <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</h1>

    <div><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</div>

    <div><h2>Prix : <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 €</h2></div>

    <form action="../controllers/login.php" method="post">
            
        <input type="submit" id="submit" name="addToCartButton" value="+ Ajouter au panier">
             
    </form>
</div><?php }
}

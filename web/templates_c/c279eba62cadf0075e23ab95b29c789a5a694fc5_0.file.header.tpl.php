<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-20 21:02:17
  from '/var/www/views/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8f50599cf695_59851140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c279eba62cadf0075e23ab95b29c789a5a694fc5' => 
    array (
      0 => '/var/www/views/header.tpl',
      1 => 1603227734,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8f50599cf695_59851140 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu</title>
</head>
<body>
    <div>    
        Ceci est un header
        <form action="login.php" method="POST"></form>
            <h1>Connexion</h1>
            <label><b>Username :</b></label>
            <input type="text" placeholder="JohnDoe" name="username" required>

            <label><b>Password :</b></label>
            <input type="password" placeholder="password" name="password" required>

            <input type="submit" id="submit" value="LOGIN">
            
         

        </form>
    </div>
</body>
</html><?php }
}

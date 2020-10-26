<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-26 20:55:12
  from '/var/www/views/loginForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f9737b015d5f5_62120417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '672c833ee6e0dae14ba2dcd2c4d93a21612a91a2' => 
    array (
      0 => '/var/www/views/loginForm.tpl',
      1 => 1603741449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f9737b015d5f5_62120417 (Smarty_Internal_Template $_smarty_tpl) {
?><div>  
    <h2>Connexion</h2>
    <form action="../controllers/login.php" method="post">
        
    
        <label for="username" ><b>Username :</b></label>
        <input type="text" placeholder="JohnDoe" name="username" id="username" required>
    
        <label for="password"><b>Password :</b></label>
        <input type="password" placeholder="password" name="password" id="password" >
    
        <input type="submit" id="submit" value="LOGIN">
             
    </form>
</div> <?php }
}

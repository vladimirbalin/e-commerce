<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-20 05:22:02
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fde8b1a815621_33636897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f44972403b2489add4d3d1b72f2713444ad37a54' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\main.tpl',
      1 => 1608420121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5fde8b1a815621_33636897 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
/css/main.css" type="text/css">
    <?php echo '<script'; ?>
 src="/www/js/script.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="container">
    <div id="header">
        <h1>
            <a href="http://e-commerce">my shop - интернет магазин</a></h1>
    </div>
<div class="main">
    <?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

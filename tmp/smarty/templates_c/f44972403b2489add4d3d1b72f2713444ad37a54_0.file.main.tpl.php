<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-16 08:54:46
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb1e9f6df8f26_17502559',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f44972403b2489add4d3d1b72f2713444ad37a54' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\main.tpl',
      1 => 1605495285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5fb1e9f6df8f26_17502559 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>

    <div id="header">
        <h1>
            <a href="http://e-commerce">my shop - интернет магазин</a></h1>
    </div>
<div class="main">
    <?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

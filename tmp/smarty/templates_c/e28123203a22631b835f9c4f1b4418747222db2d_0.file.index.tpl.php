<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-25 19:42:21
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f9580bd2aa364_92126450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e28123203a22631b835f9c4f1b4418747222db2d' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\index.tpl',
      1 => 1603631557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f9580bd2aa364_92126450 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="centerColumn">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
        <div class="product-menu">
            <a href="product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                <img src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" style="max-width: 100px; max-height: 100px"
                     alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
            </a><br/>
            <a href="product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
            <div style="clear: both"></div>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
</div><?php }
}

<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-02 23:14:19
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa03e6ba91e96_29145415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b44a255f6c6df2c72ac0ac4c68098be5180e0fa' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\category.tpl',
      1 => 1604337246,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa03e6ba91e96_29145415 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="centerColumn">
    <div class="title"><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</div>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
        <div class="product">
            <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                <img src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" style="max-width: 100px; max-height: 100px"
                     alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"/>
            </a><br/>
            <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
            <div style="clear: both"></div>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCategories']->value, 'childCat', false, NULL, 'childCat', array (
));
$_smarty_tpl->tpl_vars['childCat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['childCat']->value) {
$_smarty_tpl->tpl_vars['childCat']->do_else = false;
?>
        <div class="subcategory">
            <a href="/category/<?php echo $_smarty_tpl->tpl_vars['childCat']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['childCat']->value['name'];?>
</a>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if (empty($_smarty_tpl->tpl_vars['rsProducts']->value) && empty($_smarty_tpl->tpl_vars['rsChildCategories']->value)) {?>
        нет товаров...
    <?php }?>
</div>
</div><?php }
}

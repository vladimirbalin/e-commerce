<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-14 23:57:11
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd7a77763ca31_39875257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53d4c26d329e207be37d8f01e5e281709b50d49b' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\product.tpl',
      1 => 1607968628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd7a77763ca31_39875257 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product">
    <h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>
    <img style="max-width: 575px;max-height: 460px;" src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
    <p>Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
</p>
    <a href="#"
       id="addToCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
"
            <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value === 1) {?> class="hide" <?php }?>
       onclick="cartInteractions.addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;"
    >Добавить в корзину</a>
    <a href="#"
       id="removeFromCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
"
            <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value === 0) {?> class="hide" <?php }?>
       onclick="cartInteractions.removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;">Убрать из корзины</a>
    <p>Описание: <?php echo $_smarty_tpl->tpl_vars['rsProductDescription']->value;?>
</p>

</div>
</div><?php }
}

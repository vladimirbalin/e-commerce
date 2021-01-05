<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 14:49:31
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4281b46c6e8_36293263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '530537330c98ceb8d4a489ce3f71e1184dd0bf43' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\user.tpl',
      1 => 1609836570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4281b46c6e8_36293263 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="centerColumn">
    <h1>Ваши регистрационные данные</h1>
    <table id="tableUserData" border="0">
        <tr>
            <td>Логин (email)</td>
            <td><?php echo $_smarty_tpl->tpl_vars['userArr']->value['email'];?>
</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" name="newName" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['userArr']->value['name'];?>
"></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" name="newPhone" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['userArr']->value['phone'];?>
"></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><textarea name="newAddress" id="newAddress"><?php echo $_smarty_tpl->tpl_vars['userArr']->value['address'];?>
</textarea></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password" name="newPwd1" id="newPwd1" value=""></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password" name="newPwd2" id="newPwd2" value=""></td>
        </tr>
        <tr>
            <td>Для сохранения изменений введите текущий пароль</td>
            <td><input type="password" name="curPwd" id="curPwd" value=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" value="Сохранить изменения" onclick="updateUserData();"></td>
        </tr>

    </table>
    <?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
        <p>Нет заказов...</p>
    <?php } else { ?>
        <table border="1">
            <tr class="table_titles">
                <th>№</th>
                <th>Действие</th>
                <th>ID заказа</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Дата оплаты</th>
                <th>Дополнительная информация</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'order', false, NULL, 'orders', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['order']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
                <tr>
                    <th><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</th>
                    <th><a href="#" onclick="user.showProducts('<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
'); return false;">Показать товары заказа</a>
                    </th>

                    <th><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</th>
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value['status'];
$_prefixVariable1 = ob_get_clean();
if (!$_prefixVariable1) {?>
                        <th>Не оплачен</th>
                    <?php } else { ?>
                        <th>Оплачен</th>
                    <?php }?>
                    <th><?php echo $_smarty_tpl->tpl_vars['order']->value['date_created'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['order']->value['date_payment'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['order']->value['comment'];?>
</th>
                </tr>
                <tr class="hide" id="purchaseForOrderId_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
                    <td colspan="7">
                        <?php if ($_smarty_tpl->tpl_vars['order']->value['products']) {?>
                            <table border="1">
                                <tr>
                                    <th>№</th>
                                    <th>ID товара</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                </tr>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['products'], 'product', false, NULL, 'products', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                                    <tr>
                                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
</td>
                                        <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['product']->value['amount'];?>
</td>
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </table>
                        <?php }?>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    <?php }?>
</div>
</div><?php }
}

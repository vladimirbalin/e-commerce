<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-14 23:28:33
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd7a0c11b9259_95891574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba835bf12d4c68c3bb0c0ca363f37ba90c921753' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\order.tpl',
      1 => 1607961943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd7a0c11b9259_95891574 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="centerColumn">
    <h3 class="title">Данные заказа</h3>
    <form id="orderForm" method="POST">
        <table>
            <tr>
                <td>№</td>
                <td>Наименование</td>
                <td>Количество</td>
                <td>Цена за единицу</td>
                <td>Стоимость</td>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'product', false, NULL, 'products', array (
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
                    <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></td>
                    <td>
                        <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                            <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>

                        </span>
                    </td>
                    <td>
                        <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                            <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <span id="itemFinalPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                            <input type="hidden" name="itemFinalPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"
                                   value="<?php echo $_smarty_tpl->tpl_vars['product']->value['finalPrice'];?>
">
                           <?php echo $_smarty_tpl->tpl_vars['product']->value['finalPrice'];?>

                        </span>

                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
        <?php if ((isset($_smarty_tpl->tpl_vars['userArr']->value))) {?>
            <?php $_smarty_tpl->_assignInScope('buttonClass', '');?>
            <h3>Данные заказчика</h3>
            <div id="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
></div>
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['userArr']->value['name'];?>
"></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['userArr']->value['phone'];?>
"></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea id="address" name="address"><?php echo $_smarty_tpl->tpl_vars['userArr']->value['address'];?>
</textarea></td>
                </tr>
            </table>
        <?php } else { ?>
            <div id="loginBox">
                <div class="menuCaption">Авторизация</div>
                <label for="loginEmail">login:</label><br>
                <input type="text" name="loginEmail" id="loginEmail" value=""><br>
                <label for="loginPwd">password:</label><br>
                <input type="password" name="loginPwd" id="loginPwd" value=""><br>
                <input type="button" onclick="user.login();" value="Войти">
            </div>

            <div id="registerBox">
                <div class="menuCaption">Регистрация</div>
                <div id="registerBoxHidden">
                    <label for="email">email:</label><br>
                    <input type="text" name="email" id="email"><br>
                    <label for="pwd1">пароль:</label> <br>
                    <input type="password" name="pwd1" id="pwd1"><br>
                    <label for="pwd2">повторить пароль:</label><br>
                    <input type="password" name="pwd2" id="pwd2"><br>

                    <label for="name">Имя*</label><br>
                    <input type="text" name="name" id="name" value=""><br>
                    <label for="phone">Тел*</label><br>
                    <input type="text" name="phone" id="phone" value=""><br>
                    <label for="phone">Адрес*</label><br>
                    <textarea name="address" id="address"></textarea><br>
                    <input type="button" onclick="user.registerNewUser();" value="Зарегистрироваться"/>
                </div>
            </div>
            <?php $_smarty_tpl->_assignInScope('buttonClass', "class='hide'");?>
        <?php }?>

        <input type="button" id="btnSaveOrder" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 value="Оформить заказ" onclick="orders.saveOrder()">
    </form>
</div>
</div><?php }
}

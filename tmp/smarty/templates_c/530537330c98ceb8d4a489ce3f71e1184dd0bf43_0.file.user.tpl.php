<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 22:09:35
  from 'D:\web-no-sync\openserver\OpenServer\domains\e-commerce\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc7bc3f5b84a3_05172229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '530537330c98ceb8d4a489ce3f71e1184dd0bf43' => 
    array (
      0 => 'D:\\web-no-sync\\openserver\\OpenServer\\domains\\e-commerce\\views\\default\\user.tpl',
      1 => 1606925374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc7bc3f5b84a3_05172229 (Smarty_Internal_Template $_smarty_tpl) {
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
</div>
</div><?php }
}

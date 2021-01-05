<div id="centerColumn">
    <h1>Ваши регистрационные данные</h1>
    <table id="tableUserData" border="0">
        <tr>
            <td>Логин (email)</td>
            <td>{$userArr['email']}</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" name="newName" id="newName" value="{$userArr['name']}"></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" name="newPhone" id="newPhone" value="{$userArr['phone']}"></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><textarea name="newAddress" id="newAddress">{$userArr['address']}</textarea></td>
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
    {if !$rsUserOrders}
        <p>Нет заказов...</p>
    {else}
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
            {foreach $rsUserOrders as $order name=orders}
                <tr>
                    <th>{$smarty.foreach.orders.iteration}</th>
                    <th><a href="#" onclick="user.showProducts('{$order['id']}'); return false;">Показать товары заказа</a>
                    </th>

                    <th>{$order['id']}</th>
                    {if !{$order['status']}}
                        <th>Не оплачен</th>
                    {else}
                        <th>Оплачен</th>
                    {/if}
                    <th>{$order['date_created']}</th>
                    <th>{$order['date_payment']}</th>
                    <th>{$order['comment']}</th>
                </tr>
                <tr class="hide" id="purchaseForOrderId_{$order['id']}">
                    <td colspan="7">
                        {if $order['products']}
                            <table border="1">
                                <tr>
                                    <th>№</th>
                                    <th>ID товара</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                </tr>
                                {foreach $order['products'] as $product name=products}
                                    <tr>
                                        <td>{$smarty.foreach.products.iteration}</td>
                                        <td>{$product['product_id']}</td>
                                        <td><a href="/product/{$product['product_id']}/">{$product['name']}</a></td>
                                        <td>{$product['price']}</td>
                                        <td>{$product['amount']}</td>
                                    </tr>
                                {/foreach}
                            </table>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </table>
    {/if}
</div>
</div>
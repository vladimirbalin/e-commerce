<div id="centerColumn">
    <h3 class="title">Данные заказа</h3>
    <form action="/cart/saveorder/" id="orderForm" method="POST">
        <table>
            <tr>
                <td>№</td>
                <td>Наименование</td>
                <td>Количество</td>
                <td>Цена за единицу</td>
                <td>Стоимость</td>
            </tr>
            {foreach $rsProducts as $product name=products}
                <tr>
                    <td>{$smarty.foreach.products.iteration}</td>
                    <td><a href="/product/{$product['id']}">{$product['name']}</a></td>
                    <td>
                        <span id="itemCnt_{$product['id']}">
                            <input type="hidden" name="itemCnt_{$product['id']}" value="{$product['count']}">
                            {$product['count']}
                        </span>
                    </td>
                    <td>
                        <span id="itemPrice_{$product['id']}">
                            <input type="hidden" name="itemPrice_{$product['id']}" value="{$product['price']}">
                            {$product['price']}
                        </span>
                    </td>
                    <td>
                        <span id="itemFinalPrice_{$product['id']}">
                            <input type="hidden" name="itemFinalPrice_{$product['id']}"
                                   value="{$product['finalPrice']}">
                           {$product['finalPrice']}
                        </span>

                    </td>
                </tr>
            {/foreach}
        </table>
        {if isset($userArr)}
            {$buttonClass = ""}
            <h3>Данные заказчика</h3>
            <div id="orderUserInfoBox" {$buttonClass}></div>
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="name" name="name" value="{$userArr['name']}"></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input type="text" id="phone" name="phone" value="{$userArr['phone']}"></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea id="address" name="address">{$userArr['address']}</textarea></td>
                </tr>
            </table>
        {else}
            <div id="loginBox">
                <div class="menuCaption">Авторизация</div>
                <label for="loginEmail">login:</label><br>
                <input type="text" name="loginEmail" id="loginEmail" value=""><br>
                <label for="loginPwd">password:</label><br>
                <input type="password" name="loginPwd" id="loginPwd" value=""><br>
                <input type="button" onclick="login();" value="Войти">
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
                    <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
                </div>
            </div>
            {$buttonClass="class='hide'"}
        {/if}

        <input type="button" id="btnSaveOrder" {$buttonClass} value="Оформить заказ" onclick="saveOrder()">
    </form>
</div>
</div>
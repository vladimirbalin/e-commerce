<div class="leftColumn">
    <div class="menuCaption">Меню:</div>
    {foreach $rsCategories as $item}
        <a href="/category/{$item['id']}/">{$item['name']}</a>
        <br/>
        {if isset($item['children'])}
            {foreach $item['children'] as $child}
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/category/{$child['id']}/">{$child['name']}</a>
                <br/>
            {/foreach}
        {/if}
    {/foreach}
    <br>

    {if $userArr}
        <div id="userBox">
            <a href="/user/" id="userLink">Пользователь: {$userArr['displayName']}</a><br>
            <a href="/user/logout/" id="logout">Выход</a>
        </div>
    {else}
        <div id="userBox" class="hide">
            <a href="/user/" id="userLink"></a><br>
            <a href="/user/logout/" id="logout">Выход</a>
        </div>
        {if !isset($hideLoginBox)}
            <div id="loginBox">
                <div class="menuCaption">Авторизация</div>
                <label for="loginEmail">login:</label><br>
                <input type="text" name="loginEmail" id="loginEmail" value=""><br>
                <label for="loginPwd">password:</label><br>
                <input type="password" name="loginPwd" id="loginPwd" value=""><br>
                <input type="button" onclick="login();" value="Войти">
            </div>
            <div id="registerBox">
                <div class="menuCaption showHidden" onclick="showRegisterBox()">Регистрация</div>
                <div id="registerBoxHidden" class="hide">
                    <label for="email">email:</label><br>
                    <input type="text" name="email" id="email"><br>
                    <label for="pwd1">пароль:</label> <br>
                    <input type="password" name="pwd1" id="pwd1"><br>
                    <label for="pwd2">повторить пароль:</label><br>
                    <input type="password" name="pwd2" id="pwd2"><br>
                    <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
                </div>
            </div>
        {/if}
    {/if}

    <div class="menuCaption">Корзина</div>
    <a href="/cart/">В корзине</a>
    <span id="cartCountItems">
        {if $cartCountItems > 0} {$cartCountItems} {else} пусто{/if}
    </span>
</div>
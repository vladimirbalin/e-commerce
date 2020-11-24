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

    <div id="registerBox">
        <div class="menuCaption showHidden" onclick="showRegisterBox()">Регистрация</div>
        <div id="registerBoxHidden">
            <label for="email">email:</label><br>
            <input type="text" name="email" id="email"><br>
            <label for="pwd1">пароль:</label> <br>
            <input type="password" name="pwd1" id="pwd1"><br>
            <label for="pwd2">повторить пароль:</label><br>
            <input type="password" name="pwd2" id="pwd2"><br>
            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
        </div>
    </div>

    <div class="menuCaption">Корзина</div>
    <a href="/cart/">В корзине</a>
    <span id="cartCountItems">
{if $cartCountItems > 0} {$cartCountItems} {else} пусто{/if}
</span>
</div>
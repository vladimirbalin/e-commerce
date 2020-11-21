<div id="centerColumn">
    <h3 class="title">Корзина</h3>
    {if !$rsProducts} В корзине пусто
    {else}
        <table>
            <tr>
                <td>
                    #
                </td>
                <td>
                    Наименование
                </td>
                <td>
                    Количество
                </td>
                <td>
                    Цена за единицу
                </td>
                <td>
                    Стоимость
                </td>
                <td>
                    Действие
                </td>
            </tr>
        {foreach $rsProducts as $product name=products}
            <tr>
                <td>
                    {$smarty.foreach.products.iteration}
                </td>
                <td>
                    <a href="/product/{$product['id']}/">{$product['name']}</a>
                </td>
                <td>
                    <button id="minusOneItem" onclick="minusOneItem({$product['id']})">-</button>

                    <input name="itemCnt_{$product['id']}" id="itemCnt_{$product['id']}"
                           size="1"
                           type="text"
                           value="1"
                           onchange="conversionPrice({$product['id']});">
                    <button id="plusOneItem" onclick="plusOneItem({$product['id']})">+</button>
                </td>
                <td>
                    <span id="itemPrice_{$product['id']}">{$product['price']}</span>
                </td>
                <td>
                    <span id="itemTotalPrice_{$product['id']}">{$product['price']}</span>
                </td>
                <td>
                    <a id="removeFromCart_{$product['id']}"
                       href="#"
                       onclick="removeFromCart({$product['id']}); return false;">Удалить из корзины</a>
                    <a id="addToCart_{$product['id']}" href="#"
                       class="hide"
                       onclick="addToCart({$product['id']}); return false;">Восстановить</a>
                </td>
            </tr>
        {/foreach}
        </table>
    {/if}
</div>
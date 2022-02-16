<div id="centerColumn">
    <h3 class="title">Корзина</h3>
    {if !$rsProducts} <p>В корзине пусто</p>
    {else}
        <form action="/cart/order/" method="POST">
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
                            <input type="button" id="minusOneItem_{$product['id']}"
                                   onclick="cartMainPage.minusOneItem({$product['id']})" value="-">

                            <input name="itemCnt_{$product['id']}" id="itemCnt_{$product['id']}"
                                   size="1"
                                   type="text"
                                   value="1"
                                   onchange="cartMainPage.conversionPrice({$product['id']});">
                            <input type="button" id="plusOneItem_{$product['id']}"
                                   onclick="cartMainPage.plusOneItem({$product['id']})" value="+">
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
                               onclick="cartInteractions.removeFromCart({$product['id']}); return false;">Удалить из корзины</a>
                            <a id="addToCart_{$product['id']}" href="#"
                               class="hide"
                               onclick="cartInteractions.addToCart({$product['id']}); return false;">Восстановить</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
            <input type="submit" value="Оформить заказ">
        </form>
    {/if}
</div>
</div>
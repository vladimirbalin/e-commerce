<div class="product">
    <h3>{$rsProduct['name']}</h3>
    <img style="max-width: 575px;max-height: 460px;" src="/www/images/products/{$rsProduct['image']}" alt="{$rsProduct['image']}">
    <p>Стоимость: {$rsProduct['price']}</p>
    <a href="#"
       id="addToCart_{$rsProduct['id']}"
            {if $itemInCart === 1} class="hide" {/if}
       onclick="cartInteractions.addToCart({$rsProduct['id']}); return false;"
    >Добавить в корзину</a>
    <a href="#"
       id="removeFromCart_{$rsProduct['id']}"
            {if $itemInCart === 0} class="hide" {/if}
       onclick="cartInteractions.removeFromCart({$rsProduct['id']}); return false;">Убрать из корзины</a>
    <p>Описание: {$rsProductDescription}</p>

</div>
</div>
<div id="centerColumn">
    <div class="title">{$pageTitle}</div>
    {foreach $rsProducts as $item name=products}
        <div class="product">
            <a href="/product/{$item['id']}/">
                <img src="/www/images/products/{$item['image']}" style="max-width: 100px; max-height: 100px"
                     alt="{$item['name']}"/>
            </a><br/>
            <a href="/product/{$item['id']}/">{$item['name']}</a>
        </div>
        {if $smarty.foreach.products.iteration mod 3 == 0}
            <div style="clear: both"></div>
        {/if}
    {/foreach}
    {foreach $rsChildCategories as $childCat name=childCat}
        <div class="subcategory">
            <a href="/category/{$childCat['id']}/">{$childCat['name']}</a>
        </div>
    {/foreach}
    {if empty($rsProducts) && empty($rsChildCategories)}
        нет товаров...
    {/if}
</div>
</div>
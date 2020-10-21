<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        {foreach $rsCategories as $item}
            <a href="/category/{$item['id']}/">{$item['name']}</a>
            <br/>
            {if isset($item['children'])}
                {foreach $item['children'] as $child}
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="/category/{$child['id']}/">{$child['name']}</a>
                    <br/>
                {/foreach}
            {/if}
        {/foreach}
    </div>
</div>
{extends file="parent:frontend/index/index.tpl"}

{block name="frontend_index_header_title"}{strip}
    {if $jlauteEnvironment}{$jlauteEnvironment|upper} {/if}{$smarty.block.parent}
{/strip}{/block}

{extends file='parent:backend/index/parent.tpl'}

{block name='backend/base/header/title'}{if $jlaute_is_dev}DEV {elseif $jlaute_is_staging}STAGING {/if}Shopware {Shopware::VERSION} {Shopware::VERSION_TEXT} (Rev. {Shopware::REVISION}) - Backend (c) shopware AG{/block}

{block name="backend/base/header/css" append}
    {$gradients = '165deg, #c6eaf6 5%, #dff1f6 45%, #daedf5 55%, #abc8ee 100%'}
    {if $jlaute_is_dev}
        {$gradients = '195deg, #129903, rgba(255,0,0,0)'}
    {elseif $jlaute_is_staging}
        {$gradients = '195deg, #960004, rgba(255,0,0,0)'}
    {/if}

    <style>
        body {
            background: center center no-repeat, linear-gradient({$gradients}) !important;
        }
    </style>
{/block}

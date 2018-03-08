{extends file='parent:backend/index/parent.tpl'}

{block name='backend/base/header/title'}{if $jlauteEnvironment}{$jlauteEnvironment|upper} {/if}Shopware {Shopware::VERSION} {Shopware::VERSION_TEXT} (Rev. {Shopware::REVISION}) - Backend (c) shopware AG{/block}

{block name="backend/base/header/css" append}
    {if $jlauteEnvironment == 'dev'}
        {$gradients = '165deg, #c6eaf6 5%, #dff1f6 45%, #68B961 100%'}
    {elseif $jlauteEnvironment == 'staging'}
        {$gradients = '165deg, #c6eaf6 5%, #dff1f6 45%, #A2525B 100%'}
    {/if}

    {if $gradients}
        <style>
            body {
                background: center center no-repeat, linear-gradient({$gradients}) !important;
            }
        </style>
    {/if}
{/block}

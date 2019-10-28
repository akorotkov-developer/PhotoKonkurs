<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<div data-def-tab="<?=$arResult['DEFAULT_TAB'] ?>" class="header-bottom jury-header">

    <div class="header-bottom__title">
        <h2><?= $arResult["NAME"] ?></h2>
    </div>

    <div class="header-bottom__layout-controls">
        <div class="btn layout-table">
            <svg class="icon layout-table-icon">
                <use xlink:href="#layout-table-icon"/>
            </svg>
        </div>
        <div class="btn layout-list">
            <svg class="icon layout-list-icon">
                <use xlink:href="#layout-list-icon"/>
            </svg>
        </div>
    </div>

</div>

<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<div data-def-tab="<?= $arResult['DEFAULT_TAB'] ?>" class="header-bottom">

    <?
    $APPLICATION->IncludeComponent('runetsoft:voting.report', '',
        array(
            "IBLOCK_ID" => LIST_REQUEST_FOR_VOTE_IBLOCK_ID,
            "BLOCK_LIST" => ".photo-list",
            "ITEM_ID" => ".photo",
            "ITEM_KEY" => "data-element-id",
            "NOMANATION_IBLOCK_ID" => NOMINATION_IBLOCK_ID,
            "CLASS_TO_ADD" => ".photo__img",
            "NOMINATION" => $arResult['ID'],
            "STATUS_CODE" => $arResult['STATUS_TAB'],
        ), $component
    );
    ?>

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

    <div class="header-bottom__sort <?= $arResult['SORT'] ? 'sort-on' : '' ?> <?= $arResult['SORT'] == "asc" ? 'sort-reverse' : '' ?>"
         title="Сортировать по рейтингу">

        <div class="btn sort-down">
            <a href="<?= $APPLICATION->GetCurPageParam("sort=asc", array("sort")) ?>">
                <svg class="icon sort-down-icon">
                    <use xlink:href="#sort-down-icon"/>
                </svg>
            </a>
        </div>

        <div class="btn sort-up">
            <a href="<?= $APPLICATION->GetCurPageParam("sort=desc", array("sort")) ?>">
                <svg class="icon sort-up-icon">
                    <use xlink:href="#sort-up-icon"/>
                </svg>
            </a>
        </div>
    </div>


</div>

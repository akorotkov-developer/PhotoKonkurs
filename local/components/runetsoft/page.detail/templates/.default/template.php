<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?$this->SetViewTarget('top_header_tabs'); ?>

<div class="navigation">

    <? foreach ($arResult["TOP_TABS"] as $key => $tab): ?>

        <div class="tab <?= $tab['ACTIVE'] == "Y" ? "active" : "" ?>">

            <a href="<?= $tab["LINK"] ?>">

                <?= $tab["NAME"] ?>

                <? if ($tab["COUNT_ELEMS"] && ($tab['ID'] == "new" || $tab['ID'] == "N")): ?>

                    <span class="number"><?= $tab["COUNT_ELEMS"] ?></span>

                <? endif; ?>

            </a>
        </div>

    <? endforeach; ?>

</div>


<? $this->EndViewTarget(); ?>

    <?

    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "photo-list",
        array(
            "TEMPLATE_PAGE" => $arResult['TEMPLATE_PAGE'],
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COMPONENT_TEMPLATE" => "photo-list",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "arFilter",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "9",
            "IBLOCK_TYPE" => "contest",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "15",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(
                0 => "EMAIL",
                1 => "PIC_DATE",
                2 => "PIC_DESCRIPTION",
                3 => "PIC_PLACE",
                4 => "PHONE",
                5 => "MODEL_RELEASE",
                6 => "PIC_NAME",
                7 => "FORM_ACCEPT",
                8 => "TECH_INFO",
                9 => "",
            ),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => $arResult['SORT'] ? "PROPERTY_AVERAGE_RATING" : 'DATE_CREATE',
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => $arResult['SORT'] ? $arResult['SORT'] : "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N",
            "LAYOUT" => "layout-table"
        ),
        $component
    );


?>

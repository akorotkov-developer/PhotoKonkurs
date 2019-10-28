<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<hr style="width: 80%">
<div class="navigation">

    <?if($arResult["bDescPageNumbering"] === true):?>

    <?else:?>


        <font class="text">

        <?if ($arResult["NavPageNomer"] > 1):?>

            <?if($arResult["bSavePage"]):?>

            <?else:?>

                <?if ($arResult["NavPageNomer"] > 2):?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_prev")?></a>
                <?else:?>

                <?endif?>

            <?endif?>

        <?else:?>

        <?endif?>

        <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>

            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <span class="current"><?=$arResult["nStartPage"]?></span>
            <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
                <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
            <?else:?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
            <?endif?>
            <?$arResult["nStartPage"]++?>
        <?endwhile?>

        <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>

        <?else:?>

        <?endif?>

    <?endif?>


    <?if ($arResult["bShowAll"]):?>
    <noindex>
        <?if ($arResult["NavShowAll"]):?>

        <?else:?>

        <?endif?>
    </noindex>
    <?endif?>

    </font>

</div>
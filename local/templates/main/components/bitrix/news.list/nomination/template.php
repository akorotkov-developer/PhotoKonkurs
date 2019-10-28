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
?>
<?if (empty($arResult["ITEMS"])) return;?>
<ul class="nominations-list row">
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
    <li class="nominations-list__element col-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?/*<a class="nominations-list__element__link" href="" title="Перейти к номинации «<?= $arItem["NAME"]?>»">*/?>
            <div class="nominations-list__element-wrapper"><div class="nominations-list__element__bgr" <?if(!is_null($arItem["PREVIEW_PICTURE"]["SRC"])): ?>style="background-image: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"]?>)"<?endif;?>></div></div>
            <h3 class="nominations-list__element__header"><?= $arItem["NAME"]?></h3>
            <div class="nominations-list__element__description"><?= $arItem["PREVIEW_TEXT"]?></div>
        <?/*</a>*/?>
    </li>

<?endforeach;?>
</ul>
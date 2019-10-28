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
<div class="jury"><a id="jury" name="#jury"></a>
	<div class="container">
		<h2><?=GetMessage("HEADER_JURY")?></h2>

<ul class="jury-list jury-list-slick">
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
    <li class="jury-list__element" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <img alt="<?= $arItem["NAME"]?>" src="<?= $arItem["PREVIEW_PICTURE_CUT"];?>" class="jury-list__element__img" title="<?= $arItem["NAME"]?>">
        <div class="jury-list__element__name"><?= $arItem["NAME"]?></div>
        <div class="jury-list__element__position"><?= $arItem["PREVIEW_TEXT"]?></div>
    </li>

<?endforeach;?>
</ul>
	</div>
</div>
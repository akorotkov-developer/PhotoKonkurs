<?
foreach ($arResult["ITEMS"] as $k => $arItem){
	$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["PIC"]["VALUE"], array('width'=>1033, 'height'=>693), BX_RESIZE_IMAGE_PROPORTIONAL_ALT , true, false, false, 100);
	$arResult["ITEMS"][$k]["PICTURE_CUT"] = $file['src'];
	$thumbnail = CFile::ResizeImageGet($arItem["PROPERTIES"]["PIC"]["VALUE"], array('width'=>96, 'height'=>76), BX_RESIZE_IMAGE_EXACT , true, false, false, 100);
	$arResult["ITEMS"][$k]["THUMBNAIL"] = $thumbnail['src'];
}


foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['RATING'] = \Runetsoft\Vote\VoteTable::getAverageValue($arItem['ID']);
    $arItem['VOTED_COUNT'] = \Runetsoft\Vote\VoteTable::getCountVote($arItem['ID']);
}




?>
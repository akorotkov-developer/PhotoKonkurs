<?
	foreach ($arResult["ITEMS"] as $k => $arItem){
		$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_EXACT , true);
		$arResult["ITEMS"][$k]["PREVIEW_PICTURE_CUT"] = $file['src'];
	}
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотоконкурс");
?><?
?>
<?
if($_REQUEST['is_ajax']=='y')
    $APPLICATION->RestartBuffer();

$APPLICATION->IncludeComponent('runetsoft:page.detail','');

if($_REQUEST['is_ajax']=='y')
    die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
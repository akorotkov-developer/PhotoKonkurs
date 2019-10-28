<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$assets = \Bitrix\Main\Page\Asset::getInstance();

?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID?>">
    <head>
        <?$APPLICATION->ShowHead();?>
        <title><?$APPLICATION->ShowTitle()?></title>
        <?
        $assets->addString('<meta name="viewport" content="width=1200, initial-scale=0">', true);
        $assets->addCss("https://use.fontawesome.com/releases/v5.7.2/css/all.css");
        $assets->addCss(SITE_TEMPLATE_PATH. "/assets/libs/slick/slick.min.css");
        $assets->addCss(SITE_TEMPLATE_PATH."/assets/libs/slick/slick-theme.min.css");
        $assets->addCss(SITE_TEMPLATE_PATH. "/assets/libs/selectize/selectize.css");
        $assets->addCss(SITE_TEMPLATE_PATH. "/assets/libs/air-datepicker/air-datepicker.css");
        $assets->addCss(SITE_TEMPLATE_PATH."/assets/css/main-style.css");

        CJSCore::Init(array("jquery2"));
        $assets->addJs(SITE_TEMPLATE_PATH."/assets/js/libs/bootstrap.min.js");
        $assets->addJs(SITE_TEMPLATE_PATH."/assets/libs/jquery-validate/jquery.form-validator.min.js");
        $assets->addJs(SITE_TEMPLATE_PATH."/assets/libs/selectize/selectize.js");
        $assets->addJs(SITE_TEMPLATE_PATH."/assets/libs/mask/jquery.mask.js");
        $assets->addJs(SITE_TEMPLATE_PATH."/assets/libs/slick/slick.min.js");
        $assets->addJs(SITE_TEMPLATE_PATH."/assets/libs/air-datepicker/air-datepicker.js");
        $assets->addJs(SITE_TEMPLATE_PATH."/assets/js/main.js");
        ?>
    </head>
<body>
<? if ($USER->IsAuthorized()) {
    //$asset->addJs(SITE_TEMPLATE_PATH . '/assets/js/admin_panel.js'); ?>
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<? } ?>
    <header class="header">
        <nav class="main-nav">
            <div class="container">
<?$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "top-menu",
    array(
        "ROOT_MENU_TYPE" => "top",
        "MAX_LEVEL" => "1",
        "CHILD_MENU_TYPE" => "top",
        "USE_EXT" => "Y",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "Y",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "COMPONENT_TEMPLATE" => "top-menu"
    ),
    false
);?>
            </div>
        </nav>
    </header>
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <ul class="footer-nav-list">
        <li class="footer-nav-list__element"><a class="logo logo__footer" href="http://www.rushydro.ru" title="На главную РусГидро"></a></li>
        <?
        foreach($arResult as $arItem):
            if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <li class="footer-nav-list__element"><a class="footer-nav-list__element__link <?if($arItem["SELECTED"]) : ?>selected<?endif;?>" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><?=$arItem["TEXT"]?></a></li>
        <?endforeach?>

    </ul>
<?endif?>
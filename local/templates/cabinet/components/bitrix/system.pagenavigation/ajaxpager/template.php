<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true); ?>

<? while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>

    <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]+1):?>

        <div style="width:100%;text-align:center;">

            <a class="NewShowElement" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>">Показать еще</a></div>

    <?endif?>

    <?$arResult["nStartPage"]++;?>

<?endwhile;?>

<script>
    $(document).on('click', '.NewShowElement', function(){
        var elementOnClick = $(this);
        $.get($('.NewShowElement').attr('href'), {is_ajax: 'y'}, function(data){
            $('.NewShowElement').after(data);
            elementOnClick.remove();});
        return false;
    })
</script>

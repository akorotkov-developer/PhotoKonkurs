<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use \Bitrix\Main\Localization\Loc;
?>

<div class="photo-list <?= $arParams["LAYOUT"] ?>">

    <?if(!empty($arResult["ITEMS"])): ?>

    <? $count = count($arResult["ITEMS"]); ?>

    <input type="hidden" value="<?= $count ?>">

    <div class="btn-wrapper">
        <div class="btn pick-photo"><span><?= GetMessage("PICK_PHOTO") ?></span></div>
    </div>

    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <? endif; ?>

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="photo" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-element-id="<?= $arItem['ID'] ?>">
            <div class="photo__img-block">
                <div class="photo__img">

                    <img class="lazy"
                         data-src="<?= Cfile::getPath($arItem["PROPERTIES"]["PIC"]["VALUE"]) ?>"
                         data-original="<?= $arItem["PICTURE_CUT"] ?>"
                         data-thumbnail="<?= $arItem["THUMBNAIL"] ?>"
                         src="data:image/gif;base64,R0lGODlh/AFVAYAAAP///wAAACH5BAEAAAEALAAAAAD8AVUBAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fxs+/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPgmlEAUAADs="
                         alt=""
                         data-sub-html=".caption<?= $arItem["ID"] ?>">
                </div>
            </div>
            <div class="photo__info caption<?= $arItem["ID"] ?>">
                <div class="photo__info-text">
                    <div class="photo__info-date"><?= $arItem["PROPERTIES"]["PIC_DATE"]["VALUE"] ?></div>
                    <div class="photo__info-name"><?= htmlspecialcharsBack($arItem["NAME"]) ?></div>
                    <div class="photo__info-pic"><?= htmlspecialcharsBack($arItem["PROPERTIES"]["PIC_NAME"]["VALUE"]) ?></div>
                    <div class="photo__info-place"><?= htmlspecialcharsBack($arItem["PROPERTIES"]["PIC_PLACE"]["VALUE"]) ?></div>
                </div>
                <div class="photo__info-rating">

                    <div class="rating-number">
                        <span class="star__img">
                            <svg class="icon star-icon"><use xlink:href="#star-icon"/></svg></span>
                        <span><?= $arItem['RATING'] ?></span>
                    </div>
                    <div class="rating-voters">
                        <span><?= Loc::getMessage("ADD_VOTE") ?> <?= $arItem['VOTED_COUNT'] ?> <?= Loc::getMessage("PEOPLE") ?></span>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>

    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>

    <? if (0): ?>
        <div class="btn-wrapper">
            <div class="btn more"><span><?= GetMessage("MORE") ?></span></div>
        </div>
    <? endif; ?>

    <?else: ?>

    <p><?= Loc::getMessage("NO_ELEMENTS") ?></p>

    <?endif; ?>


</div>

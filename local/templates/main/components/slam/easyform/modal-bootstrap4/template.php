<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use \Bitrix\Main\Localization\Loc;

$FORM_ID           = trim($arParams['FORM_ID']);
$FORM_AUTOCOMPLETE = $arParams['FORM_AUTOCOMPLETE'] ? 'on' : 'off';
$FORM_ACTION_URI   = "";
$WITH_FORM = strlen($arParams['WIDTH_FORM']) > 0 ? 'style="max-width:'.$arParams['WIDTH_FORM'].'"' : '';

?>
<?if($arParams['NAME_MODAL_BUTTON']):?>
    <div class="slam-easyform">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal<?=$FORM_ID?>"><?=$arParams['NAME_MODAL_BUTTON']?></button>
    </div>
<?endif;?>
<div class="slam-easyform<?=$arParams['HIDE_FORMVALIDATION_TEXT'] == 'Y' ? ' hide-formvalidation' : ''?>">
    <div id="modal<?=$FORM_ID?>" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade modal-review">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <? if($arParams['FORM_NAME']): ?>
                        <h5 class="modal-title" id="makeOrderLabel"><?=$arParams['FORM_NAME']?></h5>
                    <? endif?>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&#10006;</button>
                </div>
                <div class="modal-body">
                    <div <?=$WITH_FORM?> >
                        <form id="<?=$FORM_ID?>"
                              enctype="multipart/form-data"
                              method="POST"
                              action="<?=$FORM_ACTION_URI;?>"
                              autocomplete="<?=$FORM_AUTOCOMPLETE?>"
                              novalidate="novalidate"
                              class="form row has-validation-callback"
                            >
                            <div class="alert alert-success <?if($arResult['STATUS'] != 'ok'):?>hidden<?endif;?>" role="alert">
                                <?=$arParams['OK_TEXT']?>
                            </div>
                            <div class="alert alert-danger <?if($arResult['STATUS'] != 'error'):?>hidden<?endif;?>" role="alert">
                                <?=$arParams['ERROR_TEXT']?>
                                <?if(!empty($arResult['ERROR_MSG'])):?>
									</br>
									<?=implode('</br>', $arResult['ERROR_MSG'])?>
                                <?endif;?>
                            </div>

                            <input type="hidden" name="FORM_ID" value="<?=$FORM_ID?>">
                            <input type="text" name="ANTIBOT[NAME]" value="<?=$arResult['ANTIBOT']['NAME'];?>" class="d-none">

                            <?//hidden fields
                            foreach($arResult['FORM_FIELDS'] as $fieldCode => $arField)
                            {
                                if($arField['TYPE'] == 'hidden')
                                {
                                    ?>
                                    <input type="hidden" name="<?=$arField['NAME']?>" value="<?=$arField['VALUE'];?>"/>
                                    <?
                                    unset($arResult['FORM_FIELDS'][$fieldCode]);
                                }
                            }
                            ?>
                            <?
                            if(!empty($arResult['FORM_FIELDS'])):
                                foreach($arResult['FORM_FIELDS'] as $fieldCode => $arField): ?>
                                    <?if(!$arParams['HIDE_ASTERISK'] && !$arParams['HIDE_FIELD_NAME']){
                                        $required = '';
                                        if($arField['REQUIRED'] and !in_array( $arField['TYPE'], array('accept', 'file') ) ) {
                                            $required = 'required';
                                        }
                                    }

                                $classFormGroup = "form-group col-12";
                                $classFormGroup .= $arField['TYPE'] == 'file' ? ' choose-file ' . $arField["CODE"] : '';
                                $classFormGroup .= $arField['CODE'] == 'filerelease' ? ' d-none' : '';
                                $classFormGroup .= $arField['TYPE'] == 'date' ? ' form-group__date' : '';
                                $classFormGroup .= !is_null($required) ? ' '.$required : '';
                                ?>
                                <div class="<?= $classFormGroup?>">

                                    <?if($arField['TYPE'] == 'textarea'):?>
                                        <? if(!$arParams['HIDE_FIELD_NAME']): ?>
                                            <label class="control-label" for="<?=$arField['ID']?>"><?=$arField['TITLE']?></label>
                                        <? endif; ?>
                                        <div>
                                            <textarea class="form-control" id="<?=$arField['ID']?>" rows="5" name="<?=$arField['NAME']?>" <?=$arField['PLACEHOLDER_STR'];?> <?=$arField['REQ_STR']?>><?=$arField['VALUE'];?></textarea>
                                        </div>
                                    <?elseif($arField['TYPE'] == 'radio' || $arField['TYPE'] == 'checkbox'):?>
                                        <? if(!$arParams['HIDE_FIELD_NAME']): ?>
                                            <label class="control-label"><?=$arField['TITLE']?>&nbsp;</label>
                                        <? endif; ?>
                                        <?foreach($arField['VALUE'] as $key => $arVal):?>
                                            <?if(!$arField['SHOW_INLINE']):?><div class="<?=$arField['TYPE']?>"><?endif;?>
                                            <?if(!empty($arVal)):?>
                                                <label class="<?=$arField['SHOW_INLINE'] ? $arField['TYPE'].'-inline' : ''?>">
                                                    <input  type="<?=$arField['TYPE']?>" name="<?=$arField['NAME']?>" value="<?=$arVal?>" <?=$arField['REQ_STR']?>>&nbsp;<?=$arVal?>
                                                </label>
                                            <? endif; ?>
                                            <?if(!$arField['SHOW_INLINE']):?></div><?endif;?>
                                        <?endforeach;?>
                                    <?elseif ($arField['TYPE'] == 'date') :?>
                                        <? if(!$arParams['HIDE_FIELD_NAME']): ?>
                                            <label class="control-label" for="inputDate"><?=$arField['TITLE']?>&nbsp;</label>
                                        <? endif; ?>
                                        <div class="calendar-icon">
                                            <input class="form-control date-control" id="inputDate"
                                                   name="<?=$arField['NAME']?>"
                                                   <?if(!is_null($required)) :?>required=""<?endif;?>
                                                   value="<?=$arField['VALUE'];?>" <?=$arField['REQ_STR']?> <?=$arField['MASK_STR']?>>
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    <?elseif($arField['TYPE'] == 'accept'):?>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="<?= $arField["ID"]?>"  type="checkbox" name="<?=$arField['NAME']?>" value="<?=Loc::getMessage('SLAM_EASYFORM_YES')?>" <?=$arField['REQ_STR']?>>
                                            <label class="custom-control-label" for="<?= $arField["ID"]?>">
                                                <?=htmlspecialcharsBack($arField['VALUE'])?>
                                                <?if($arField['REQUIRED']):?><span class="label-required">*</span><?endif;?>
                                            </label>
                                        </div>
                                    <?elseif($arField['TYPE'] == 'select'):?>
                                        <div class="form-group switch-parent">
                                            <? if(!$arParams['HIDE_FIELD_NAME']): ?>
                                                <label for="<?=$arField['ID']?>" class="control-label"><?=$arField['TITLE']?></label>
                                            <? endif; ?>
                                            <div class="selectize-input items full has-options has-items">
                                                <select class="form-control" id="<?=$arField['ID']?>" <?=$arField['MULTISELECT'] == 'Y' ? 'multiple' : ''?> name="<?=$arField['NAME']?>" <?=$arField['REQ_STR']?>>

                                                    <? /*if($arField['MULTISELECT'] != 'Y'): ?>
                                                        <option value="">&#8212;</option>
                                                    <? endif; */?>

                                                    <?if(is_array($arField['VALUE'])):?>
                                                        <?foreach($arField['VALUE'] as $arVal):?>
                                                            <?if(!empty($arVal)):?>
                                                                <option value="<?=$arVal?>"><?=$arVal?></option>
                                                            <?endif;?>
                                                        <?endforeach;?>
                                                        <?if($arField['SET_ADDITION_SELECT_VAL']):?>
                                                            <option value="" data-switch="other"><?=$arField['ADDITION_SELECT_VAL']?></option>
                                                        <?endif;?>
                                                    <?endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <?if($arField['SET_ADDITION_SELECT_VAL']):?>
                                            <div class="form-group switch-child invisible">
                                                <? if(!$arParams['HIDE_FIELD_NAME']): ?>
                                                    <label class="control-label" for="<?=$arField['SET_ADDITION_SELECT_ID']?>"><?=$arField['TITLE']?></label>
                                                <? endif; ?>
                                                <div class="row">
                                                    <div class="col-xs-9">
                                                        <input class="form-control" type="text" id="<?=$arField['SET_ADDITION_SELECT_ID']?>" name="<?=$arField['ADDITION_SELECT_NAME']?>" value="" maxlength="30" <?=$arField['REQ_STR']?>>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <a href="" class="btn-switch-back" onclick="return false;"><?=Loc::getMessage('SLAM_EASYFORM_TO_LIST')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?endif;?>
                                    <?elseif($arField['TYPE'] == 'file'):?>
                                        <div class="form-control-wrapper">
                                            <? if(!$arParams['HIDE_FIELD_NAME']): ?>
                                                <label class="control-label col-lg-6"" for="file_input_<?=$arField['ID']?>"><?=$arField['TITLE']?>
                                                <i class="fas fa-file-download"></i></label>
                                            <? endif; ?>
                                            <? $CID = $GLOBALS["APPLICATION"]->IncludeComponent(
                                                'bitrix:main.file.input',
                                                $arField['DROPZONE_INCLUDE'] ? 'drag_n_drop' : 'custom',
                                                array(
                                                    'HIDE_FIELD_NAME' => $arParams['HIDE_FIELD_NAME'],
                                                    'INPUT_NAME' => $arField['CODE'],
                                                    'INPUT_TITLE' => $arField['TITLE'],
                                                    'INPUT_NAME_UNSAVED' => $arField['CODE'],
                                                    'MAX_FILE_SIZE' => $arField['FILE_MAX_SIZE'],//'20971520', //20Mb
                                                    'MULTIPLE' => 'Y',
                                                    'CONTROL_ID' => $arField['ID'],
                                                    'MODULE_ID' => 'slam.easyform',
                                                    'ALLOW_UPLOAD' => 'F',
                                                    'ALLOW_UPLOAD_EXT' => $arField['FILE_EXTENSION'],
                                                ),
                                                $component,
                                                array("HIDE_ICONS" => "Y")
                                            );?>
                                        </div>
                                    <?else:?>
                                        <? if(!$arParams['HIDE_FIELD_NAME']): ?>
                                            <label class="control-label" for="<?=$arField['ID']?>"><?=$arField['TITLE']?></label>
                                        <? endif; ?>
                                        <input class="form-control" type="<?=$arField['TYPE'];?>" id="<?=$arField['ID']?>" name="<?=$arField['NAME']?>" value="<?=$arField['VALUE'];?>" <?=$arField['PLACEHOLDER_STR'];?> <?=$arField['REQ_STR']?> <?=$arField['MASK_STR']?>>
                                    <?endif;
                                    ?>
                                    </div><?
                                endforeach;?>
                                <?if($arParams["USE_CAPTCHA"]):?>
                                    <div class="form-group col-12">
                                        <? if(!$arParams['HIDE_FIELD_NAME'] && strlen($arParams['CAPTCHA_TITLE']) > 0): ?>
                                            <label for="<?=$FORM_ID?>-captchaValidator" class="control-label"><?=htmlspecialcharsBack($arParams['CAPTCHA_TITLE'])?></label>
                                        <? endif; ?>
                                        <input id="<?=$FORM_ID?>-captchaValidator"  class="form-control" type="text" required data-bv-notempty-message="<?=GetMessage("SLAM_REQUIRED_MESS");?>" name="captchaValidator" style="border: none; height: 0; padding: 0; visibility: hidden;">
                                        <div id="<?=$FORM_ID?>-captchaContainer"></div>
                                    </div>
                                <?endif;?>

                                <div class="form-group col-12 text-center">
                                    <?if($arResult['WARNING_MSG']):?>
                                        <p class="warning-buy"><small><?=$arResult['WARNING_MSG'];?></small></p>
                                    <?endif;?>
                                    <button type="submit" class="btn btn-secondary" data-default="<?=$arParams['FORM_SUBMIT_VALUE']?>"><?=$arParams['FORM_SUBMIT_VALUE']?></button>
                                </div>
                            <?endif;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?if($arParams['SHOW_MODAL'] == 'Y'):?>
        <div class="modal fade modal-add-holiday" id="frm-modal-<?=$FORM_ID?>"  role='dialog' aria-hidden='true'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix">
                        <? if($arParams['TITLE_SHOW_MODAL'] || $arParams['FORM_NAME']): ?>
                            <h5 class="modal-title" id="makeOrderLabel"><?=$arParams['TITLE_SHOW_MODAL'] ? : $arParams['FORM_NAME']?></h5>
                        <? endif?>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&#10006;</button>
                    </div>
                    <div class="modal-body">
                        <p class="ok-text"><?=$arParams['OK_TEXT']?></p>
                    </div>
                </div>
            </div>
        </div>
    <?endif;?>
</div>

<script type="text/javascript">
    var easyForm = new JCEasyForm(<?echo CUtil::PhpToJSObject($arParams)?>);
</script>

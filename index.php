<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "РусГидро - всероссийский фотоконкурс");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Главная");
?><div class="main-info">
<div class="container">
 <a class="logo logo__main-info" href="/" title="На главную РусГидро"></a>
	<h1>Всероссийский фотоконкурс</h1>
	<ul class="main-info-list">
		<li class="main-info-list__element">Профессионалы и любители</li>
		<li class="main-info-list__element">Энергообъекты РусГидро</li>
		<li class="main-info-list__element">C марта по октябрь </li>
	</ul>


    <? $APPLICATION->IncludeComponent(
	"api:formdesigner", 
	"custom", 
	array(
		"COMPONENT_TEMPLATE" => "custom",
		"IBLOCK_TYPE" => "contest",
		"IBLOCK_ID" => "9",
		"UNIQUE_FORM_ID" => "",
		"REDIRECT_URL" => "",
		"ENABLED_FIELDS" => array(
			0 => "FIO",
			1 => "PHONE",
			2 => "EMAIL",
			3 => "NOMINATION",
			4 => "PIC_NAME",
			5 => "PIC_DATE",
			6 => "PIC_PLACE",
			7 => "PIC_DESCRIPTION",
			8 => "TECH_INFO",
			9 => "MODEL_RELEASE",
			10 => "RELEASE_FILE",
			11 => "PIC",
		),
		"POST_EMAIL_CODE" => "EMAIL",
		"COMPATIBLE_ON" => "N",
		"SHOW_ERRORS" => "Y",
		"MESS_REQUIRED_FIELD" => "#FIELD# обязательно",
		"MESS_CHECK_EMAIL" => "Указанный email некорректен",
		"HIDE_FIELDS" => array(
		),
		"DIVIDER_FIELDS" => array(
		),
		"FORM_WIDTH" => "100%",
		"FORM_TITLE" => "",
		"SHOW_TITLE" => "Y",
		"FORM_HORIZONTAL" => "N",
		"MESS_SUCCESS" => "Заявка отправлена!",
		"MESS_SUCCESS_DESC" => "Мы рассмотрим сообщение и обязательно свяжемся с вами",
		"SUBMIT_BUTTON_CLASS" => "afd-button",
		"SUBMIT_BUTTON_TEXT" => "Подать заявку",
		"SUBMIT_BUTTON_AJAX" => "Отправляется заявка...",
		"MESS_CHOOSE" => "(выбрать)",
		"USE_BX_CAPTCHA" => "N",
		"TEMPLATE_THEME" => "",
		"TEMPLATE_COLOR" => "#add6ec",
		"TEMPLATE_BG_COLOR" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "31536000",
		"IBLOCK_ON" => "Y",
		"POST_ON" => "Y",
		"UPLOAD_FILE_SIZE" => "5M",
		"UPLOAD_FILE_LIMIT" => "1",
		"UPLOAD_FOLDER" => "/upload/api_formdesigner",
		"USE_MODAL" => "Y",
		"YAMETRIKA_ON" => "N",
		"YM2_ON" => "N",
		"GA_ON" => "N",
		"USE_EULA" => "Y",
		"USE_PRIVACY" => "N",
		"USER_CONSENT" => "N",
		"PAGE_VARS" => array(
			0 => "",
			1 => "",
		),
		"SERVER_VARS" => array(
			0 => "",
			1 => "",
		),
		"UTM_VARS" => array(
			0 => "",
			1 => "",
		),
		"PAGE_TITLE" => "",
		"PAGE_URL" => "",
		"DIR_URL" => "",
		"DATE_TIME" => "",
		"DATE" => "",
		"IP" => "",
		"WYSIWYG_ON" => "N",
		"JQUERY_ON" => "N",
		"JQUERY_VERSION" => "jquery2",
		"INPUTMASK_ON" => "Y",
		"VALIDATE_ON" => "N",
		"MESS_EULA" => "Отправляя работу на конкурс, я подтверждаю, что ознакомлен и согласен с Положением о конкурсе и даю согласие на <a href=\"/upload/Soglasie_pers.docx\" class=\"link-primary\" target=\"_blank\">обработку персональных данных</a>                                                <span class=\"label-required\">*</span> ",
		"MESS_EULA_CONFIRM" => "Для продолжения вы должны принять условия Пользовательского соглашения",
		"MESS_PRIVACY" => "Я согласен на обработку персональных данных",
		"MESS_PRIVACY_LINK" => "/upload/Soglasie_pers.docx",
		"MESS_PRIVACY_CONFIRM" => "Отправляя работу на конкурс, я подтверждаю, что ознакомлен и согласен с Положением о конкурсе и даю согласие на обработку персональных данных",
		"IBLOCK_TICKET_CODE" => "TICKET_ID",
		"IBLOCK_ELEMENT_NAME" => "#FIO#",
		"IBLOCK_ELEMENT_CODE" => "#FIO#",
		"IBLOCK_ELEMENT_ACTIVE" => "Y",
		"INPUTMASK_JS" => "Y",
		"INPUTMASK_FIELD_FIO" => "",
		"INPUTMASK_FIELD_PHONE" => "'mask': '+7 (999) 999-9999'",
		"INPUTMASK_FIELD_EMAIL" => "",
		"INPUTMASK_FIELD_NOMINATION" => "",
		"INPUTMASK_FIELD_PIC_NAME" => "",
		"INPUTMASK_FIELD_PIC_DATE" => "",
		"INPUTMASK_FIELD_PIC_PLACE" => "",
		"INPUTMASK_FIELD_PIC_DESCRIPTION" => "",
		"INPUTMASK_FIELD_TECH_INFO" => "",
		"INPUTMASK_FIELD_MODEL_RELEASE" => "",
		"INPUTMASK_FIELD_FORM_ACCEPT" => "",
		"INPUTMASK_FIELD_STATUS" => "",
		"MODAL_ID" => "#api_fd_modal_make_request",
		"MODAL_BTN_TEXT" => "Подать заявку",
		"MODAL_BTN_CLASS" => "btn btn-secondary",
		"MODAL_BTN_ID" => "",
		"MODAL_BTN_SPAN_CLASS" => "api_icon",
		"MODAL_HEADER_TEXT" => "Подать заявку",
		"MODAL_FOOTER_TEXT" => "Нажимая на кнопку \"Подать заявку\", вы даете согласие на обработку персональных данных",
		"INPUTMASK_FIELD_AVERAGE_RATING" => "",
		"POST_REPLACE_FROM" => "N",
		"POST_EMAIL_FROM" => "",
		"POST_EMAIL_TO" => "BorisovKA@rushydro.ru, testrns@yandex.ru",
		"POST_ADMIN_MESSAGE_ID" => array(
			0 => "21",
			1 => "",
		),
		"POST_ADMIN_SUBJECT" => "#SITE_NAME#: Сообщение из формы заявки",
		"POST_USER_MESSAGE_ID" => array(
			0 => "",
			1 => "",
		),
		"POST_USER_SUBJECT" => "#SITE_NAME#: Копия сообщения из формы обратной связи",
		"POST_MESS_STYLE_WRAP" => "padding:10px;border-bottom:1px dashed #dadada;",
		"POST_MESS_STYLE_NAME" => "font-weight:bold;",
		"POST_MESS_STYLE_VALUE" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
); ?>

</div>
 </div> <div class="konkurs">
<div class="container">
	 <a id="konkurs" name="#konkurs"></a> <br>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/info.html"
	)
);?>

    <? $APPLICATION->IncludeComponent(
	"api:formdesigner", 
	"custom", 
	array(
		"COMPONENT_TEMPLATE" => "custom",
		"IBLOCK_TYPE" => "contest",
		"IBLOCK_ID" => "9",
		"UNIQUE_FORM_ID" => "",
		"REDIRECT_URL" => "",
		"ENABLED_FIELDS" => array(
			0 => "FIO",
			1 => "PHONE",
			2 => "EMAIL",
			3 => "NOMINATION",
			4 => "PIC_NAME",
			5 => "PIC_DATE",
			6 => "PIC_PLACE",
			7 => "PIC_DESCRIPTION",
			8 => "TECH_INFO",
			9 => "MODEL_RELEASE",
			10 => "RELEASE_FILE",
			11 => "PIC",
		),
		"POST_EMAIL_CODE" => "EMAIL",
		"COMPATIBLE_ON" => "N",
		"SHOW_ERRORS" => "Y",
		"MESS_REQUIRED_FIELD" => "#FIELD# обязательно",
		"MESS_CHECK_EMAIL" => "Указанный email некорректен",
		"HIDE_FIELDS" => array(
		),
		"DIVIDER_FIELDS" => array(
		),
		"FORM_WIDTH" => "100%",
		"FORM_TITLE" => "",
		"SHOW_TITLE" => "Y",
		"FORM_HORIZONTAL" => "N",
		"MESS_SUCCESS" => "Заявка отправлена!",
		"MESS_SUCCESS_DESC" => "Мы рассмотрим сообщение и обязательно свяжемся с вами",
		"SUBMIT_BUTTON_CLASS" => "afd-button",
		"SUBMIT_BUTTON_TEXT" => "Подать заявку",
		"SUBMIT_BUTTON_AJAX" => "Отправляется заявка...",
		"MESS_CHOOSE" => "(выбрать)",
		"USE_BX_CAPTCHA" => "N",
		"TEMPLATE_THEME" => "",
		"TEMPLATE_COLOR" => "#add6ec",
		"TEMPLATE_BG_COLOR" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "31536000",
		"IBLOCK_ON" => "Y",
		"POST_ON" => "Y",
		"UPLOAD_FILE_SIZE" => "5M",
		"UPLOAD_FILE_LIMIT" => "1",
		"UPLOAD_FOLDER" => "/upload/api_formdesigner",
		"USE_MODAL" => "Y",
		"YAMETRIKA_ON" => "N",
		"YM2_ON" => "N",
		"GA_ON" => "N",
		"USE_EULA" => "Y",
		"USE_PRIVACY" => "N",
		"USER_CONSENT" => "N",
		"PAGE_VARS" => array(
			0 => "",
			1 => "",
		),
		"SERVER_VARS" => array(
			0 => "",
			1 => "",
		),
		"UTM_VARS" => array(
			0 => "",
			1 => "",
		),
		"PAGE_TITLE" => "",
		"PAGE_URL" => "",
		"DIR_URL" => "",
		"DATE_TIME" => "",
		"DATE" => "",
		"IP" => "",
		"WYSIWYG_ON" => "N",
		"JQUERY_ON" => "N",
		"JQUERY_VERSION" => "jquery2",
		"INPUTMASK_ON" => "Y",
		"VALIDATE_ON" => "N",
		"MESS_EULA" => "Отправляя работу на конкурс, я подтверждаю, что ознакомлен и согласен с Положением о конкурсе и даю согласие на <a href=\"/upload/Soglasie_pers.docx\" class=\"link-primary\" target=\"_blank\">обработку персональных данных</a>                                                <span class=\"label-required\">*</span> ",
		"MESS_EULA_CONFIRM" => "Для продолжения вы должны принять условия Пользовательского соглашения",
		"MESS_PRIVACY" => "Я согласен на обработку персональных данных",
		"MESS_PRIVACY_LINK" => "/upload/Soglasie_pers.docx",
		"MESS_PRIVACY_CONFIRM" => "Отправляя работу на конкурс, я подтверждаю, что ознакомлен и согласен с Положением о конкурсе и даю согласие на обработку персональных данных",
		"IBLOCK_TICKET_CODE" => "TICKET_ID",
		"IBLOCK_ELEMENT_NAME" => "#FIO#",
		"IBLOCK_ELEMENT_CODE" => "#FIO#",
		"IBLOCK_ELEMENT_ACTIVE" => "Y",
		"INPUTMASK_JS" => "Y",
		"INPUTMASK_FIELD_FIO" => "",
		"INPUTMASK_FIELD_PHONE" => "'mask': '+7 (999) 999-9999'",
		"INPUTMASK_FIELD_EMAIL" => "",
		"INPUTMASK_FIELD_NOMINATION" => "",
		"INPUTMASK_FIELD_PIC_NAME" => "",
		"INPUTMASK_FIELD_PIC_DATE" => "",
		"INPUTMASK_FIELD_PIC_PLACE" => "",
		"INPUTMASK_FIELD_PIC_DESCRIPTION" => "",
		"INPUTMASK_FIELD_TECH_INFO" => "",
		"INPUTMASK_FIELD_MODEL_RELEASE" => "",
		"INPUTMASK_FIELD_FORM_ACCEPT" => "",
		"INPUTMASK_FIELD_STATUS" => "",
		"MODAL_ID" => "#api_fd_modal_becom_a_member",
		"MODAL_BTN_TEXT" => "Стать участником",
		"MODAL_BTN_CLASS" => "btn btn-secondary",
		"MODAL_BTN_ID" => "",
		"MODAL_BTN_SPAN_CLASS" => "api_icon",
		"MODAL_HEADER_TEXT" => "Подать заявку",
		"MODAL_FOOTER_TEXT" => "Нажимая на кнопку \"Подать заявку\", вы даете согласие на обработку персональных данных",
		"INPUTMASK_FIELD_AVERAGE_RATING" => "",
		"POST_REPLACE_FROM" => "N",
		"POST_EMAIL_FROM" => "",
		"POST_EMAIL_TO" => "BorisovKA@rushydro.ru, testrns@yandex.ru",
		"POST_ADMIN_MESSAGE_ID" => array(
			0 => "21",
			1 => "",
		),
		"POST_ADMIN_SUBJECT" => "#SITE_NAME#: Сообщение из формы заявки",
		"POST_USER_MESSAGE_ID" => array(
			0 => "",
			1 => "",
		),
		"POST_USER_SUBJECT" => "#SITE_NAME#: Копия сообщения из формы обратной связи",
		"POST_MESS_STYLE_WRAP" => "padding:10px;border-bottom:1px dashed #dadada;",
		"POST_MESS_STYLE_NAME" => "font-weight:bold;",
		"POST_MESS_STYLE_VALUE" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
); ?>

</div>
 </div> <div class="bonus"><a id="bonus" name="#bonus"></a>
<div class="container">
	<ul class="bonus-list row">
		<li class="bonus-list__element col-6 col-md-3">
		<div class="bonus-list__element__img">
		</div>
		<div class="bonus-list__element__text">
			 Попади в юбилейный фотоальбом – стань частью истории РусГидро
		</div>
 </li>
		<li class="bonus-list__element col-6 col-md-3">
		<div class="bonus-list__element__img">
		</div>
		<div class="bonus-list__element__text">
			 Стань участником юбилейной фотовыставки
		</div>
 </li>
		<li class="bonus-list__element col-6 col-md-3">
		<div class="bonus-list__element__img">
		</div>
		<div class="bonus-list__element__text">
			 Посети энергообъекты РусГидро
		</div>
 </li>
		<li class="bonus-list__element col-6 col-md-3">
		<div class="bonus-list__element__img">
		</div>
		<div class="bonus-list__element__text">
			 Получи памятные подарки и призы
		</div>
 </li>
	</ul>
</div>
 </div> <div class="conditions"> <a id="conditions" name="#conditions"></a>
<div class="container">
	<h2>Условия участия</h2>
	<ul class="nav nav-tabs nav-tabs_conditions" role="tablist">
		<li class="nav-item nav-tabs_conditions__item"><a class="nav-link nav-tabs_conditions__item__link active" id="nav-tabs__conditions-tab1-header" data-toggle="tab" href="#nav-tabs__conditions-tab1" role="tab" aria-controls="nav-tabs__conditions-tab1" aria-selected="true">Требования к участникам</a></li>
		<li class="nav-item nav-tabs_conditions__item"><a class="nav-link nav-tabs_conditions__item__link" id="nav-tabs__conditions-tab2-header" data-toggle="tab" href="#nav-tabs__conditions-tab2" role="tab" aria-controls="nav-tabs__conditions-tab2" aria-selected="false">Требования к работе</a></li>
	</ul>
	<div class="tab-content" id="conditionsTabs">
		<div class="tab-pane fade show active" id="nav-tabs__conditions-tab1" role="tabpanel" aria-labelledby="nav-tabs__conditions-tab1-header">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/trebovaniya_k_uchastiyu.html"
	)
);?>
		</div>
		<div class="tab-pane fade" id="nav-tabs__conditions-tab2" role="tabpanel" aria-labelledby="nav-tabs__conditions-tab2-header">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/trebovaniya_k_rabote.html"
	)
);?>
		</div>
	</div>
	<div class="comment-inner">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/more_info_participation.html"
	)
);?>
	</div>
</div>
<div class="comment">
</div>
 </div> <div class="stages"><a id="stages" name="#stages"></a>
<div class="container">
	<h2>Этапы </h2>
	<ul class="stages-list">
		<li class="stages-list__element">
		<div class="stages-list__element__period-start">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/steps/month_1.html"
	)
);?>
		</div>
		<div class="stages-list__element__period-end">
		</div>
		<div class="stages-list__element__description">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/steps/march_text.html"
	)
);?>
		</div>
 </li>
		<li class="stages-list__element">
		<div class="stages-list__element__period-start">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/steps/month_2.html"
	)
);?>
		</div>
		<div class="stages-list__element__period-end">
		</div>
		<div class="stages-list__element__description">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/steps/september_text.html"
	)
);?>
		</div>
 </li>
		<li class="stages-list__element">
		<div class="stages-list__element__period-start">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/steps/month_3.html"
	)
);?>
		</div>
		<div class="stages-list__element__period-end">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/steps/month_4.html"
	)
);?>
		</div>
		<div class="stages-list__element__description">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/steps/october_text.html"
	)
);?>
		</div>
 </li>
	</ul>
</div>
 </div> <div class="nominations"><a id="nominations" name="#nominations"></a>
<div class="container">
	<h2>Номинации</h2>
	 <?$APPLICATION->IncludeComponent("bitrix:news.list", "nomination", array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "nomination",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "nomination",
		"IBLOCK_TYPE" => "contents",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
</div>
 </div>
<? if(\COption::GetOptionString( "runetsoft.settings", "UF_IS_SHOW_JURY" )) : ?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "jury-all",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COMPONENT_TEMPLATE" => "jury",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"",),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "jury",
            "IBLOCK_TYPE" => "contents",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "20",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(0=>"",1=>"",),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "NAME",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N"
        )
    );?>
	

    <?endif;?>
<? if(\COption::GetOptionString( "runetsoft.settings", "UF_IS_SHOW_PARTNERS" )) : ?>
    <div class="partners"><a id="partners" name="#partners"></a>
<div class="container">
	<h2>Партнеры и оргкомитет </h2>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "partners",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "COMPONENT_TEMPLATE" => "partners",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"",),
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "partners",
            "IBLOCK_TYPE" => "contents",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "20",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array(0=>"",1=>"",),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "NAME",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "STRICT_SECTION_CHECK" => "N"
        )
    );?>
</div>
 </div>
    <?endif;?>
    <div class="contact">
<div class="container">
    <?$APPLICATION->IncludeComponent(
	"slam:easyform", 
	"modal-bootstrap4", 
	array(
		"ACTIVE_ELEMENT" => "N",
		"CATEGORY_ACCEPT_IBLOCK_FIELD" => "FORM_ACCEPT",
		"CATEGORY_ACCEPT_TITLE" => "Согласие на обработку данных",
		"CATEGORY_ACCEPT_TYPE" => "accept",
		"CATEGORY_ACCEPT_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_ACCEPT_VALUE" => "Отправляю работу на конкурс я подтверждаю, что ознакомлен и согласен с Положением о конкурсе и даю согласие на <a href=\"/upload/Soglasie_pers.docx\" class=\"link-primary\" target=\"_blank\">обработку персональных данных</a>",
		"CATEGORY_EMAIL_IBLOCK_FIELD" => "FORM_EMAIL",
		"CATEGORY_EMAIL_PLACEHOLDER" => "",
		"CATEGORY_EMAIL_TITLE" => "Ваш E-mail",
		"CATEGORY_EMAIL_TYPE" => "email",
		"CATEGORY_EMAIL_VALIDATION_ADDITIONALLY_MESSAGE" => "data-bv-emailaddress-message=\"E-mail введен некорректно\"",
		"CATEGORY_EMAIL_VALIDATION_MESSAGE" => "Обязательное поле",
		"CATEGORY_EMAIL_VALUE" => "",
		"CATEGORY_HIDDEN_TITLE" => "Скрытое поле",
		"CATEGORY_HIDDEN_TYPE" => "hidden",
		"CATEGORY_HIDDEN_VALUE" => "",
		"CATEGORY_MESSAGE_IBLOCK_FIELD" => "PREVIEW_TEXT",
		"CATEGORY_MESSAGE_PLACEHOLDER" => "",
		"CATEGORY_MESSAGE_TITLE" => "Сообщение",
		"CATEGORY_MESSAGE_TYPE" => "textarea",
		"CATEGORY_MESSAGE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_MESSAGE_VALUE" => "",
		"CATEGORY_PHONE_IBLOCK_FIELD" => "FORM_PHONE",
		"CATEGORY_PHONE_INPUTMASK" => "Y",
		"CATEGORY_PHONE_INPUTMASK_TEMP" => "+7 (999) 999-9999",
		"CATEGORY_PHONE_PLACEHOLDER" => "",
		"CATEGORY_PHONE_TITLE" => "Мобильный телефон",
		"CATEGORY_PHONE_TYPE" => "tel",
		"CATEGORY_PHONE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_PHONE_VALIDATION_MESSAGE" => "Обязательное поле",
		"CATEGORY_PHONE_VALUE" => "",
		"CATEGORY_TITLE_IBLOCK_FIELD" => "NAME",
		"CATEGORY_TITLE_PLACEHOLDER" => "",
		"CATEGORY_TITLE_TITLE" => "Ваше имя",
		"CATEGORY_TITLE_TYPE" => "text",
		"CATEGORY_TITLE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_TITLE_VALIDATION_MESSAGE" => "Обязательное поле",
		"CATEGORY_TITLE_VALUE" => "",
		"COMPONENT_TEMPLATE" => "modal-bootstrap4",
		"CREATE_IBLOCK" => "",
		"CREATE_SEND_MAIL" => "",
		"DISPLAY_FIELDS" => array(
			0 => "TITLE",
			1 => "EMAIL",
			2 => "PHONE",
			3 => "MESSAGE",
			4 => "DOCS",
			5 => "",
		),
		"EMAIL_BCC" => "testrns@yandex.ru",
		"EMAIL_FILE" => "Y",
		"EMAIL_SEND_FROM" => "N",
		"EMAIL_TO" => "BorisovKA@rushydro.ru",
		"ENABLE_SEND_MAIL" => "Y",
		"ERROR_TEXT" => "Произошла ошибка. Сообщение не отправлено.",
		"EVENT_MESSAGE_ID" => array(
			0 => "20",
		),
		"FIELDS_ORDER" => "TITLE,PHONE,EMAIL,MESSAGE,DOCS",
		"FORM_AUTOCOMPLETE" => "Y",
		"FORM_ID" => "FORM2",
		"FORM_NAME" => "Связаться с оргкомитетом",
		"FORM_SUBMIT_VALUE" => "Отправить",
		"FORM_SUBMIT_VARNING" => "Нажимая на кнопку \"#BUTTON#\", вы даете согласие на обработку <a target=\"_blank\" href=\"#\">персональных данных</a>",
		"HIDE_ASTERISK" => "N",
		"HIDE_FIELD_NAME" => "N",
		"HIDE_FORMVALIDATION_TEXT" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "formresult",
		"INCLUDE_BOOTSRAP_JS" => "Y",
		"MAIL_SUBJECT_ADMIN" => "#SITE_NAME#: Сообщение из формы Связаться с оргкомитетом",
		"OK_TEXT" => "Ваша заявка успешно отправлена.",
		"REQUIRED_FIELDS" => array(
			0 => "TITLE",
			1 => "EMAIL",
		),
		"SEND_AJAX" => "Y",
		"SHOW_MODAL" => "Y",
		"TITLE_SHOW_MODAL" => "Спасибо!",
		"USE_BOOTSRAP_CSS" => "N",
		"USE_BOOTSRAP_JS" => "N",
		"USE_CAPTCHA" => "N",
		"USE_FORMVALIDATION_JS" => "Y",
		"USE_IBLOCK_WRITE" => "Y",
		"USE_INPUTMASK_JS" => "Y",
		"USE_JQUERY" => "N",
		"USE_MODULE_VARNING" => "Y",
		"WIDTH_FORM" => "",
		"_CALLBACKS" => "",
		"NAME_MODAL_BUTTON" => "Связаться с оргкомитетом",
		"CATEGORY_DOCS_TITLE" => "Прикрепить файл",
		"CATEGORY_DOCS_TYPE" => "file",
		"CATEGORY_DOCS_FILE_EXTENSION" => "doc, docx, xls, xlsx, txt, rtf, pdf, jpg, jpeg, tif, riff",
		"CATEGORY_DOCS_FILE_MAX_SIZE" => "5242880",
		"CATEGORY_DOCS_DROPZONE_INCLUDE" => "N",
		"CATEGORY_DOCS_IBLOCK_FIELD" => "FORM_DOCS"
	),
	false
);?>
</div>
 </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
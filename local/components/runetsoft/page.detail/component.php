<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $this \CBitrixComponent
 */
CModule::IncludeModule("runetsoft.vote");
CModule::IncludeModule("iblock");

use \Runetsoft\Vote\VoteHelper;

$jury = \Runetsoft\Vote\VoteHelper::CanVoting();
$nomination = $this->request->get('nomination');
$status = $this->request->get("status");
$voted = $this->request->get('voted');

global $USER;

if($nomination) {
    if (!key_exists($nomination, VoteHelper::GetAllNomination(array("IBLOCK_ID" => NOMINATION_IBLOCK_ID))))
        return true;

    $arResult = VoteHelper::GetNomination($nomination);

    $APPLICATION->SetTitle($arResult['NAME']);
}

$arResult['SORT'] = $this->request->get('sort');

$arResult["TOP_TABS"] = VoteHelper::GetListStatus();


if($jury && $voted)
    $templatePage = "jury";
elseif($status)
    $templatePage = "user";
elseif ($jury)
    $templatePage = "jury";
else
    $templatePage = "user";


$arResult['TEMPLATE_PAGE'] = $templatePage;

$arListStatus = VoteHelper::GetAllStatus();

foreach ($arListStatus as $arStatus){

    if($arStatus['UF_DEF'] == 1) {
        $arResult['DEFAULT_TAB'] = $arStatus['UF_XML_ID'];
        $arResult['STATUS_TAB'] = $arStatus['UF_XML_ID'];
    }

}

if ($status)
    $arResult['STATUS_TAB'] = $status;


if($templatePage)
    $this->includeComponentTemplate($templatePage);

global $arFilter;
$arFilter = array();

if($arResult["ID"])
    $arFilter['PROPERTY_NOMINATION'] = $arResult["ID"];

if ($status) 
    $arFilter["PROPERTY_STATUS"] = $status;

if (\Runetsoft\Vote\VoteHelper::CanVoting() && !$status) {
    foreach ($arListStatus as $arRow) {

        if ($arRow['UF_FOR_VOTING'] == 1) {
            $arFilter['PROPERTY_STATUS'] = $arRow['UF_XML_ID'];

        }
    }
}

if($templatePage == 'user' && !$status && VoteHelper::UserCanDo("change_request_status")){

    foreach ($arListStatus as $arRow) {

        if ($arRow['UF_DEF'] == 1) {
            $arFilter['PROPERTY_STATUS'] = $arRow['UF_XML_ID'];
        }
    }
}

if ($jury) {

    $arVotedByUser = VoteHelper::GetVoteUser(array("USER_ID" => $USER->GetID()),$USER->GetID());
    $arExcludeItems = array();
    foreach ($arVotedByUser as $arVote) {
        $arExcludeItems[$arVote['ELEMENT_ID']] = true;
    }

    if(!$voted)
        $voted = "N";


    if ($voted == "N")
        $arFilter['!ID'] = array_keys($arExcludeItems);
    elseif ($voted == "Y"){
        if(array_keys($arExcludeItems))
            $arFilter['ID'] = array_keys($arExcludeItems);
        else
            $arFilter['ID'] = 0;

    }

}


$this->includeComponentTemplate();
?>
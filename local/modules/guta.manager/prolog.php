<?php

use Bitrix\Main\Localization\Loc;

define('ADMIN_MODULE_NAME', 'guta.manager');

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
/** @var array $arPath List of ways to directories. */
$arPath = [
    'local',
    'bitrix'
];

foreach ($arPath as $sPath) {
    if (is_file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $sPath . '/modules/' . ADMIN_MODULE_NAME . '/admin/fix_changes.php')) {
        include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $sPath . '/modules/' . ADMIN_MODULE_NAME . '/admin/fix_changes.php');
        break;
    }
}

CModule::IncludeModule(ADMIN_MODULE_NAME);

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
// check rights

global $APPLICATION;

if (!$USER->IsAdmin()) {
    $APPLICATION->AuthForm(Loc::getMessage('ADMIN_TOOLS_ACCESS_DENIED'));
}

chdir($_SERVER['DOCUMENT_ROOT']);


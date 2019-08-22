<?php
/** @var array $arPath List of ways to directories. */
$arPath = [
    'local',
    'bitrix'
];

foreach ($arPath as $sPath) {
    if (is_file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $sPath . '/modules/guta.manager/admin/fix_changes.php')) {
        include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $sPath . '/modules/guta.manager/admin/fix_changes.php');
        break;
    }
}

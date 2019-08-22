<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!Loader::includeModule('highloadblock')) {
    return false;
}

// items
$items = array();


// export / import
if ($USER->isAdmin()) {
    $items[] = array(
        'text' => 'Фиксация изменений',
        'url' => 'fix_changes.php',
        'module_id' => 'guta.manager',
        'items_id' => 'guta.manager_tools',

    );

}

// menu
if (!empty($items)) {
    return array(
        'parent_menu' => 'global_menu_content',
        'sort' => 350,
        'text' => '[GUTA] Панель менеджера',
        'icon' => 'highloadblock_menu_icon',
        'page_icon' => 'highloadblock_page_icon',
        'more_url' => array(
            'fix_changes.php',
        ),
        'items_id' => 'menu_guta_manager',
        'items' => $items
    );
} else {
    return false;
}

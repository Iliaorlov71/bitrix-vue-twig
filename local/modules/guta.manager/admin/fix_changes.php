<?php

use Guta\Modules\Manager\Helpers\Git;


/** @var array $arPath List of ways to directories. */
$arPath = [
    'local',
    'bitrix'
];

foreach ($arPath as $sPath) {
    if (is_file($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $sPath . '/modules/guta.manager/prolog.php')) {
        include_once($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $sPath . '/modules/guta.manager/prolog.php');
        break;
    }
}


/**
 * Есди нажали кнопку, то зафиксировать изменения.
 */
/** @var array $arPost Очищенные переменные. */
$arPost = array(
    'fix_change' => filter_input(INPUT_POST, 'fix_change', FILTER_SANITIZE_STRING),
    'fix_changes_fio' => filter_input(INPUT_POST, 'fix_changes_fio', FILTER_SANITIZE_STRING),
    'fix_changes_message' => filter_input(INPUT_POST, 'fix_changes_message', FILTER_SANITIZE_STRING),
);

if (!empty($arPost['fix_changes_fio']) && $arPost['fix_change'] == 'Y') {
    Git::fixChange($arPost['fix_changes_fio'] . ': ' . $arPost['fix_changes_message'], true, false);

    /* @internal Отправить письмо об изменениях на почту */
    $arFields = array(
        'USER' => $arPost['fix_changes_fio'],
        'MESSAGE' => $arPost['fix_changes_message'],
    );
    CEvent::SendImmediate('FIX_CHANGES_MANAGER', 's1', $arFields);
} elseif (empty($arPost['fix_changes_fio']) && $arPost['fix_change'] == 'Y') {
    ShowError("Заполните, пожалуйста, ФИО.");
}

?>

    <style>
        .form__inner {
            background: #fff;
            padding: 30px;
        }

        .form__inner_success {
            background: #7fbb8f;
            color: #fff;
            font-size: 20px;
            padding: 20px 30px;
        }
    </style>
    <div class="form__inner">
        <form name="form_tools" method="post" action="<?= $APPLICATION->GetCurPage() ?>">
            <input type="hidden" value="Y" name="fix_change"/>
            <table cellspacing="0" class="adm-filter-content-table" style="display: table;">
                <tr>
                    <td class="adm-filter-item-left">Контент-менеджер (ФИО)</td>
                    <td class="adm-filter-item-center">
                        <div class="adm-filter-alignment">
                            <div class="adm-filter-box-sizing">
                                <div class="adm-input-wrap adm-input-help-icon-wrap">
                                    <input type="text" name="fix_changes_fio" value="<?= $USER->GetFullName(); ?>"
                                           size="47" class="adm-input"/>
                                    <a title="ФИО того, кто внес изменнеия на сайт" class="adm-input-help-icon" href="#"
                                       onclick="return false;"></a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="adm-filter-item-left">Какие изменения были внесены.</td>
                    <td class="adm-filter-item-center">
                        <div class="adm-filter-alignment">
                            <div class="adm-filter-box-sizing">
                                <div class="adm-input-wrap adm-input-help-icon-wrap">
                                    <input type="text" name="fix_changes_message" value="" size="47" class="adm-input"/>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>


            <button class="adm-btn">Зафиксировать изменнения</button>
        </form>

    </div>
    </div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php');


<?php
/**
 * Created by PhpStorm.
 * User: Grudtsina.EG
 * Date: 07.05.2019
 * Time: 15:59
 */

Class guta_manager extends CModule
{
    const MODULE_ID = "guta.manager";
    var $MODULE_ID = 'guta.manager';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function guta_manager()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path . "/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = "[GUTA] Панель менеджера ";
        $this->MODULE_DESCRIPTION = "После установки вы сможете пользоваться компонентом guta:manager";
    }

    function InstallFiles()
    {

        CopyDirFiles(__DIR__ . "/admin/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin");

        CopyDirFiles(__DIR__ . "/components",
            $_SERVER["DOCUMENT_ROOT"] . "/bitrix/components", true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx("/bitrix/components/" . self::MODULE_ID);
        DeleteDirFiles($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/" . self::MODULE_ID . "/install/admin/", $_SERVER["DOCUMENT_ROOT"] . "/bitrix/admin");

        return true;
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->InstallFiles();
        RegisterModule(self::MODULE_ID);
        $APPLICATION->IncludeAdminFile("Установка модуля guta.manager", $DOCUMENT_ROOT . "/bitrix/modules/" . self::MODULE_ID . "/install/step.php");
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION;
        $this->UnInstallFiles();
        UnRegisterModule(self::MODULE_ID);
        $APPLICATION->IncludeAdminFile("Деинсталляция модуля guta.manager", $DOCUMENT_ROOT . "/bitrix/modules/" . self::MODULE_ID . "/install/unstep.php");
    }
}

?>

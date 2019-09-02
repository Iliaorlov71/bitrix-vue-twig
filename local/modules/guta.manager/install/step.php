<?php
/**
 * Created by PhpStorm.
 * User: Grudtsina.EG
 * Date: 07.05.2019
 * Time: 15:58
 */
if(!check_bitrix_sessid()) return;

echo CAdminMessage::ShowNote("Модуль guta.manager установлен");
?>

<?php
/**
 * Created by PhpStorm.
 * User: Grudtsina.EG
 * Date: 07.05.2019
 * Time: 15:57
 */
if(!check_bitrix_sessid()) return;

echo CAdminMessage::ShowNote("Модуль успешно удален из системы");
?>

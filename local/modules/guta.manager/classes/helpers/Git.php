<?php

namespace Guta\Modules\Manager\Helpers;


use CAdminMessage;
use CUtil;

/**
 * Класс для работы в консольном гите.
 * Class Git
 * @package Guta\Modules\Manager\Helpers
 */
class Git
{
    /** @var string NAME Имя пользователя */
    const NAME = 'Guta Manager';
    /** @var string ENAIL Почта пользователя */
    const EMAIL = 'webdev@gutagroup.ru';
    /** @var array $arLog Вывод выполнения запросов. */
    public static $arLog = array();

    /** {@internal Геттеры }} */

    /**
     * Метод получает текущую ветку гита.
     * @return string
     */
    public static function getCurBranch(): string
    {
        $arBranch = self::setCommand(self::getPrefix() . 'branch | grep "* "');
        return explode(' ', $arBranch[0])[1];
    }

    /**
     * Префикс для консольного выполнения комманд гита.
     * @return string
     */
    public static function getPrefix(): string
    {
        return 'git -c user.name="' . self::NAME . '" -c user.email="' . self::EMAIL . '" ';
    }

    /** {@internal Сеттеры }} */

    /**
     * Метод, выполняющий запрос в терминал.
     * @param string $sCommand Комманда для выполнения в терминале.
     * @return array
     */
    public static function setCommand(string $sCommand): array
    {
        /** @var array $arOutput Результат выполнения команды. */
        $arOutput = array();
        exec($sCommand, $arOutput);
        // Добавляем в лог
        self::$arLog += $arOutput;
        return $arOutput;
    }

    /**
     * Метод выполняет коммит для гита.
     * @param string $sMessage Сообщение для коммита.
     */
    public static function setCommit(string $sMessage): void
    {
        self::setCommand(
            self::getPrefix() .
            'commit -a -m "[Guta.Manager] ' .
            CUtil::translit(
                $sMessage,
                'ru',
                array('max_len' => 300, 'replace_space' => ' ', 'change_case' => false, 'safe_chars' => ':,?!')) .
            '"'
        );
    }

    /** {@internal Функциональные методы }} */

    /**
     * Метод фиксирует изменения в гит.
     * @param string $sMessage Сообщение для коммита.
     * @param bool $bPublic Залить изменения на продуктив.
     * @param bool $bSilent Тихий режим.
     */
    public static function fixChange(string $sMessage, bool $bPublic = false, bool $bSilent = true): void
    {
        /** @var array $arMessages Сообщения */
        $arMessages = array();
        self::setCommand(self::getPrefix() . 'add .');
        $arMessages[] = 'Новые файлы добавлены в гит.';
        self::setCommit($sMessage);
        $arMessages[] = 'Изменения зафиксированы.';

        if ($bPublic) {
            $sBranch = self::getCurBranch();
            self::setCommand(self::getPrefix() . "push origin $sBranch");
            $arMessages[] = "Изменения залиты в ветку $sBranch.";
        }

        if (!$bSilent) {

            CAdminMessage::ShowNote('Результат:' . PHP_EOL . implode(PHP_EOL, $arMessages));
        }
    }
}

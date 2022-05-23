<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FormEnum extends Enum
{

    const FEEDBACK = 1;
    const APPOINTMENTS = 2;
    const DIRECTION = 3;

    public static $name = [
        self::FEEDBACK => 'Обратный звонок',
        self::APPOINTMENTS => 'Online запись',
        self::DIRECTION => 'Заявка на услугу',
    ];

    /**
     * @param int $key
     * @return string
     */
    public static function getName(int $key = 0): array|string
    {
        return $key <> 0 ? self::$name[$key] : self::$name;
    }
}

<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DoctorEnum extends Enum
{
    const YES =   1;
    const NO =   0;

    public static $name = [
        self::YES => 'Возможен',
        self::NO => 'Не возможен'
    ];
}

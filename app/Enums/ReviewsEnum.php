<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ReviewsEnum extends Enum
{
    const POSITIVE =   1;
    const NEGATIVE =   2;

    public static $name = [
        self::POSITIVE => 'Позитивный',
        self::NEGATIVE => 'Негативный'
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

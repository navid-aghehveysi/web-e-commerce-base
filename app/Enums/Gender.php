<?php

namespace App\Enums;

enum Gender: int
{
    case MALE = 0;
    case FEMALE = 1;

    public static function values()
    {
        return array_column(
            self::cases(),
            'value'
        );
    }
    public function label()
    {
        return match ($this) {
            self::MALE => __('enums.Gender.MALE'),
            self::FEMALE => __('enums.Gender.FEMALE'),
        };
    }
    public static function options()
    {
        return array_combine(
            self::values(),
            array_map(fn($case) => $case->label(), self::cases())
        );
    }
}

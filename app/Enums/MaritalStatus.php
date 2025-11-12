<?php

namespace App\Enums;

enum MaritalStatus: int
{
    case SINGLE= 0;
    case MARRIED = 1;

    public static function values() {
        return array_column(
            self::cases(),
            'value'
        );
    }

    public function label() {
        return match ($this) {
            self::SINGLE => __('enums.MaritalStatus.SINGLE'),
            self::MARRIED => __('enums.MaritalStatus.MARRIED'),
        };
    }
    public static function options()
    {
        return array_combine(
            self::values(),
            array_map(fn ($case) => $case->label(), self::cases())
        ) ;
    }
}

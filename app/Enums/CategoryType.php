<?php

namespace App\Enums;

enum CategoryType: int
{
    case MAIN = 0;
    case SUB = 1;

    public static function values(): array
    {
        return array_column(self::cases() , 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::MAIN => __('enums.CategoryType.MAIN'),
            self::SUB => __('enums.CategoryType.SUB'),
        };
    }
    public static function options()
    {
        return array_combine(
            self::values(),
            array_map(fn ($case) => $case->label(), self::cases())
        );
    }
}

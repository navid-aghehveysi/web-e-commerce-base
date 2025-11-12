<?php

namespace App\Enums;

enum Status: int
{
    case InActive = 0;
    case Active = 1;

    public static function values(): array
    {
        return array_column(self::cases() , 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::InActive => __('enums.Status.InActive'),
            self::Active => __('enums.Status.Active'),
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

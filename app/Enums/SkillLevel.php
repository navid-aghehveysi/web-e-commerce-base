<?php

namespace App\Enums;

enum SkillLevel: int
{

    case BEGINNER = 0;
    case JUNIOR = 1;
    case MID_LEVEL = 2;
    case SENIOR = 3;
    case TECH_LEAD = 4;
    case EXPERT = 5;

    public static function values(): array
    {
        return array_column(
            self::cases()
            , 'value'
        );
    }

    public function label(): string
    {
        return match ($this) {
            self::BEGINNER => __('enums.SkillLevel.BEGINNER'),
            self::JUNIOR => __('enums.SkillLevel.JUNIOR'),
            self::MID_LEVEL => __('enums.SkillLevel.MID_LEVEL'),
            self::SENIOR => __('enums.SkillLevel.SENIOR'),
            self::TECH_LEAD => __('enums.SkillLevel.TECH_LEAD'),
            self::EXPERT => __('enums.SkillLevel.EXPERT'),
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

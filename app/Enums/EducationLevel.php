<?php

namespace App\Enums;

enum EducationLevel: int
{
    case OTHER = 0;
    case PRIMARY = 1;
    case MIDDLE = 2;
    case HIGH_SCHOOL = 3;
    case DIPLOMA = 4;
    case BACHELOR = 5;
    case MASTER = 6;
    case DOCTORATE = 7;

    public static function values()
    {
        return array_column(self::cases() , "value");
    }
    public function label()
    {
        return match ($this) {
            self::OTHER => __('enums.EducationLevel.OTHER'),
            self::PRIMARY => __('enums.EducationLevel.PRIMARY'),
            self::HIGH_SCHOOL => __('enums.EducationLevel.HIGH_SCHOOL'),
            self::MIDDLE => __('enums.EducationLevel.MIDDLE'),
            self::DIPLOMA => __('enums.EducationLevel.DIPLOMA'),
            self::BACHELOR => __('enums.EducationLevel.BACHELOR'),
            self::MASTER => __('enums.EducationLevel.MASTER'),
            self::DOCTORATE => __('enums.EducationLevel.DOCTORATE'),
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

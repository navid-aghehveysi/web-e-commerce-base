<?php


use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;


if (!function_exists('toJalali')) {

    /**
     * تبدیل تاریخ گرگوری به جلالی
     *
     * @param string|Carbon|null $date
     * @param string $format
     * @return string|null
     */
    function toJalali(Carbon|string|null $date, string $format = 'Y/m/d H:i:s')
    {

        if (!$date) return null;

        return Verta::instance($date)->format($format);

    }

    function age(Carbon|string|null $date)
    {
        $date = new Verta($date);
        return Verta::now()->diffYears($date);
    }
}

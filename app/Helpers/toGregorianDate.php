<?php


use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;


if( ! function_exists('toGregorian') ) {

    /**
     * تبدیل تاریخ گرگوری به جلالی
     *
     * @param string|Carbon|null $date
     * @param string $format
     * @throws Exception
     */
    function toGregorian(Carbon|string|null $date, string $format = 'Y/m/d H:i:s')
    {

        if(!$date) return null;

        return Verta::parse($date)->datetime();

    }
}

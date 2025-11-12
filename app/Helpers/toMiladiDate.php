<?php

use Hekmatinasser\Verta\Facades\Verta;

function toMiladiDate($date) {
    return Verta::parse($date)->formatGregorian('Y-m-d H:i:s');
}

<?php

namespace App\Helpers;


class Check
{
    public static function check($success, $index)
    {
        return $success[$index] ? 'label-success' : 'label-warning';
    }

    public static function isChecked($checked, $index)
    {
        return $checked[$index] ? 'checked' : '';
    }
}
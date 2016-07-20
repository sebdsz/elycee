<?php

namespace App\Helpers;


class OrderBy
{

    public static function render($controller, $table, $title, $option = null)
    {
        if (\Illuminate\Support\Facades\Request::get('b') === 'desc')
            return "<a href=" . action($controller, ['o' => $table, 'b' => 'asc']) . ">$title</a>";
        else
            return "<a href=" . action($controller, ['o' => $table, 'b' => 'desc']) . ">$title</a>";
    }

    public static function order($table)
    {

    }

}
<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class EnumHelper
{
    public static function getEnumValues($table, $column)
    {
        $type = DB::select("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'")[0]->Type;
        preg_match('/enum\((.*)\)/', $type, $matches);
        $enumValues = str_getcsv($matches[1], ",", "'");

        return array_combine($enumValues, $enumValues);
    }
}

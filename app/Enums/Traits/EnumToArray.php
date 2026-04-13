<?php

namespace App\Enums\Traits;


trait EnumToArray{

     public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }
    public static function values(): array
    {
        return array_coulmn(self::cases(), 'value');
    }
    public function array(): array
    {
        return array_combine(self::values(), self::names());
    }

}
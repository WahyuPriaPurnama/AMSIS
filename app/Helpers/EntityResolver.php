<?php

namespace App\Helpers;

class EntityResolver
{
    public static function resolve($modelClass, $id, $name)
    {
        return $id ?? $modelClass::firstOrCreate(['name' => $name])->id;
    }
}
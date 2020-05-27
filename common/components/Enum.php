<?php

namespace common\components;

class Enum
{
    public static function labels()
    {
        return [];
    }

    public static function label($key)
    {
        return static::labels()[$key];
    }
}
<?php

namespace common\helpers;

class DDDHelper
{
    public static function getTableName($class, $pluralize = true, $layer = 'repository')
    {
        $class = explode(DIRECTORY_SEPARATOR, $class);
        $class = array_pop($class);
        $class = strtolower($class);
        $entityName = str_replace($layer, '', $class);
        if ($pluralize) {
            $entityName .= 's';
        }

        return $entityName;
    }

    /**
     * @param string $class
     * @param string $namespace
     * @param string $layer
     * @return string
     */
    public static function getRelatedClass($class, $namespace, $layer)
    {
        $class = explode(DIRECTORY_SEPARATOR, $class);
        $className = array_pop($class);
        $className = str_replace('Service', $layer, $className);
        array_pop($class);
        array_push($class, $namespace);
        array_push($class, $className);

        return implode(DIRECTORY_SEPARATOR, $class);
    }
}
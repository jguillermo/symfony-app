<?php
namespace Misa\Common\Util;

use ReflectionClass;

/**
 * Enum Class
 *
 * @package AptitusEducation\Domain
 * @subpackage AptitusEducation\Domain\Base\Enum
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2016, Orbis
 */
abstract class AbstractEnum
{
    private static $constCacheArray = null;

    /**
     * @return array
     */
    public static function getConstants()
    {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (! array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * @param $key
     * @param bool $strict
     * @return bool
     */
    public static function isValidKey($key, $strict = true)
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($key, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($key), $keys);
    }

    /**
     * retorna el nombre de la constante
     * @param $value
     * @return bool|string
     */
    public static function getKey($value)
    {
        $value = trim($value);
        if ($value == '') {
            return false;
        }
        $constants = self::getConstants();
        return array_search($value, $constants);
    }

    /**
     * @param $value
     * @param bool $strict
     * @return bool
     */
    public static function isValidValue($value, $strict = true)
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }

    /**
     * genera un alisat de array con el key y el label de cada constante
     * @param $before
     * @param $midle
     * @param $after
     * @param bool $implode
     * @return array|string
     */
    public static function getArrayString($before, $midle, $after, $implode = false)
    {
        $constants = self::getConstants();
        $labes = static::label();
        $list = [];
        foreach ($constants as $key => $value) {
            if (isset($labes[$key])) {
                $list[] = $before.$value.$midle.$labes[$key].$after;
            }
        }
        return ($implode === false) ? $list : implode($implode, $list);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        $constants = self::getConstants();
        $labes = static::label();
        $list = [];
        foreach ($constants as $key => $value) {
            if (isset($labes[$key])) {
                $list[] = [
                    'id' => $value,
                    'name' => $labes[$key]
                ];
            }
        }
        return $list;
    }

    /**
     * @return array
     */
    public static function getArrayList()
    {
        $constants = self::getConstants();
        $labes = static::label();
        $list = [];
        foreach ($constants as $key => $value) {
            if (isset($labes[$key])) {
                $list[$value] = $labes[$key];
            }
        }
        return $list;
    }

    /**
     * @param $id
     * @return string
     */
    public static function getLabel($id)
    {
        $list = self::getList();
        $key = array_search($id, array_column($list, 'id'));
        return ($key === false ? '' : $list[$key]['name']);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 16:20
 */

namespace FilterChain\Filter;


/**
 * Class BasenameFilter
 * @package FilterChain\Filter
 *
 * Фильтр, который возвращает базовое имя класса
 */
class BasenameFilter implements FilterInterface
{
    /**
     * Запуск фильтра
     *
     * @param $filename
     * @return string
     */
    public function filter($filename)
    {
        return basename($filename);
    }
}
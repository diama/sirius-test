<?php
/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 14:01
 */

namespace FilterChain\Filter;


/**
 * Interface FilterInterface
 * @package FilterChain\Filter
 *
 * Интерфейс фильтра
 */
interface FilterInterface
{
    /**
     * Запуск фильтра
     *
     * @param $filename
     * @return mixed
     */
    public function filter($filename);
}
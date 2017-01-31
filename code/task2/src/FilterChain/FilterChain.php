<?php
/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 13:59
 */

namespace FilterChain;


use FilterChain\Filter\FilterInterface;

/**
 * Class FilterChain
 * @package FilterChain
 */
class FilterChain
{
    /**
     * @var array
     */
    protected $filters = [];

    /**
     * Добавление нового фильтра
     *
     * @param FilterInterface $filter
     * @return $this
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     * Запуск цепочки фильтров
     *
     * @param $filename
     * @return mixed
     */
    public function filter($filename)
    {
        /** @var FilterInterface $filter */
        foreach ($this->filters as $filter) {
            if ($filename){
                $filename = $filter->filter($filename);
            } else {
                break;
            }
        }

        return $filename;
    }
}
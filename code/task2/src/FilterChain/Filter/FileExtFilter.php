<?php
/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 15:44
 */

namespace FilterChain\Filter;


/**
 * Class FileExtFilter
 * @package FilterChain\Filter
 *
 * Фильтр по расширению файла
 */
class FileExtFilter implements FilterInterface
{
    /**
     * @var string
     */
    private $ext;

    /**
     * FileExtFilter constructor.
     * @param string $ext
     */
    public function __construct($ext = 'log')
    {
        $this->ext = $ext;
    }

    /**
     * Запуск фильтра
     *
     * @param $filename
     * @return bool
     */
    public function filter($filename)
    {
        if (preg_match('/\.' . $this->ext . '$/', $filename)){
            return $filename;
        }

        return false;
    }
}
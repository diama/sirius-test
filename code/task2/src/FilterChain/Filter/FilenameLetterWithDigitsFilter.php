<?php
/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 16:10
 */

namespace FilterChain\Filter;


/**
 * Class FilenameLetterWithDigitsFilter
 * @package FilterChain\Filter
 *
 * Фильтр отбирающий файлы по имени, которые содержат только цифры и буквы
 */
class FilenameLetterWithDigitsFilter implements FilterInterface
{

    /**
     * @param $filename
     * @return bool
     */
    public function filter($filename)
    {
        if (preg_match('/^([\da-z]*([a-z]{1}[\d]{1}|[\d]{1}[a-z]{1})[\da-z]*)\.(.){0,3}$/', basename($filename))){
            return $filename;
        }

        return false;
    }
}
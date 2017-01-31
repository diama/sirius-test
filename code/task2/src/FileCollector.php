<?php
use FilterChain\FilterChain;

/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 13:55
 */
class FileCollector
{
    /**
     * @var string Директория для поиска файлов
     */
    protected $dir;
    /**
     * @var FilterChain фильтровальщик
     */
    protected $filterChain;

    /**
     * FileCollector constructor.
     * @param string $dir
     * @param FilterChain|null $filterChain
     */
    public function __construct($dir = '/datafiles', FilterChain $filterChain = null)
    {
        $this->dir = $dir;
        $this->filterChain = $filterChain;
    }

    /**
     * Получаем отфильтрованный и сортированный список файлов директории
     *
     * @return array
     */
    public function getFiles() : array
    {
        $files = [];
        if (file_exists($this->dir) && $dir = opendir($this->dir)) {
            while (false !== ($entry = readdir($dir))) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                $filename = $this->dir . '/' . $entry;
                if (is_dir($filename)) {
                    $collector = new self($filename, $this->filterChain);
                    $files = array_merge($files, $collector->getFiles());
                } else {
                    if ($this->filterChain instanceof FilterChain) {
                        $filename = $this->filterChain->filter($filename);
                    }
                    if ($filename) {
                        $files[] = $filename;
                    }
                }
            }
            closedir($dir);
        }

        sort($files);
        return $files;
    }
}
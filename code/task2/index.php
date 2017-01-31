<?php
/**
 * Файл запуска задания 1.
 */


include('init.php');

$filterChain = new \FilterChain\FilterChain();
$filterChain->addFilter(new \FilterChain\Filter\FileExtFilter('ixt'))
    ->addFilter(new \FilterChain\Filter\BasenameFilter())
    ->addFilter(new \FilterChain\Filter\FilenameLetterWithDigitsFilter());

$filesCollector = new FileCollector('/datafiles', $filterChain);

$filteredFiles = $filesCollector->getFiles();
foreach ($filteredFiles as $filteredFile) {
    echo $filteredFile . PHP_EOL;
}
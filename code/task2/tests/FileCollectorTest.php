<?php

/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 16:48
 */
class FileCollectorTest extends PHPUnit_Framework_TestCase
{
    public function testClass()
    {
        $this->assertClassHasAttribute('dir', 'FileCollector');
        $this->assertClassHasAttribute('filterChain', 'FileCollector');

        $reflect = new ReflectionClass('FileCollector');
        $this->assertTrue($reflect->hasMethod('getFiles'));
    }

    public function testGetFiles()
    {
        $collector = new FileCollector('/code/task2/datafiles');
        $files = $collector->getFiles();

        $this->assertTrue(is_array($files));
        $this->assertTrue((count($files) == 7));
    }
}

<?php

/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 17:36
 */
class BasenameFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return \FilterChain\Filter\BasenameFilter
     */
    public function testClass()
    {
        $basenameFilter = new \FilterChain\Filter\BasenameFilter();
        $this->assertInstanceOf('\FilterChain\Filter\FilterInterface', $basenameFilter);

        return $basenameFilter;
    }

    /**
     * @depends testClass
     * @param \FilterChain\Filter\FilterInterface $filter
     */
    public function testFilter(\FilterChain\Filter\FilterInterface $filter)
    {
        $file = '/etc/mock.php';
        $this->assertTrue(('mock.php' == $filter->filter($file)));
    }


}

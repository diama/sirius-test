<?php

/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 17:42
 */
class FileExtFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return \FilterChain\Filter\FileExtFilter
     */
    public function testClass()
    {
        $filter = new \FilterChain\Filter\FileExtFilter();
        $this->assertInstanceOf('\FilterChain\Filter\FilterInterface', $filter);

        return $filter;
    }

    /**
     * @depends testClass
     */
    public function testFilter(\FilterChain\Filter\FilterInterface $filter)
    {
        $this->assertTrue(('test.log' == $filter->filter('test.log')));
        $this->assertFalse($filter->filter('test.tmp'));
    }


}

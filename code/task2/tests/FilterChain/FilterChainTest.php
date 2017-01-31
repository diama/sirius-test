<?php

/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 17:16
 */

class FilterChainTest extends PHPUnit_Framework_TestCase
{

    public function testClass()
    {
        $this->assertClassHasAttribute('filters', '\FilterChain\FilterChain');
        $reflect = new ReflectionClass('\FilterChain\FilterChain');
        $this->assertTrue($reflect->hasMethod('filter'));


    }

    public function testAddFilter()
    {
        $filterChain = new \FilterChain\FilterChain();
        $reflect = new ReflectionClass('\FilterChain\FilterChain');
        $filters = $reflect->getProperty('filters');
        $filters->setAccessible(true);
        $value = $filters->getValue($filterChain);

        $this->assertTrue((count($value) == 0));

        $filterChain->addFilter(new \FilterChain\Filter\BasenameFilter());
        $value = $filters->getValue($filterChain);
        $this->assertTrue((count($value) == 1));
    }


}

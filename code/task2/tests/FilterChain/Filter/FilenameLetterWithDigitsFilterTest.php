<?php

/**
 * Created by PhpStorm.
 * User: diama
 * Date: 31.01.17
 * Time: 17:46
 */
class FilenameLetterWithDigitsFilterTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testClass()
    {
        $filter = new \FilterChain\Filter\FilenameLetterWithDigitsFilter();
        $this->assertInstanceOf('\FilterChain\Filter\FilterInterface', $filter);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testFilter($filename, $filterResult)
    {
        $filter = new \FilterChain\Filter\FilenameLetterWithDigitsFilter();
        $this->assertTrue(($filterResult == $filter->filter($filename)));
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            ['a2a.txt', 'a2a.txt'],
            ['2a.txt', '2a.txt'],
            ['a2.txt', 'a2.txt'],
            ['a.txt', false],
            ['1.txt', false],
        ];
    }
}

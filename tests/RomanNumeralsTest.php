<?php

class RomanNumeralsTest extends PHPUnit_Framework_TestCase {

    private $romanNumerals;

    public function setUp()
    {
        $this->romanNumerals = new RomanNumerals();
    }

    public function romanProvider()
    {
        return [
            ['I', 1],
            ['II', 2],
            ['III', 3],
            ['IV', 4],
            ['V', 5],
            ['IX', 9],
            ['X', 10],
            ['XII', 12],
            ['XIV', 14],
            ['L', 50],
            ['LV', 55],
            ['C', 100],
            ['CXXIX', 129],
            ['D', 500],
            ['M', 1000],
            //['DCCLXXXII', 782]
        ];
    }

    /**
     * @dataProvider romanProvider
     */
    public function testRomanNumbers($expectedRomanNumber, $arabicNumber)
    {
        $this->assertEquals($expectedRomanNumber, $this->romanNumerals->toRoman($arabicNumber));
    }

    /**
     * @expectedException Exception
     */
    public function test_that_zero_is_not_handled()
    {
        $this->romanNumerals->toRoman(0);
    }

    /**
     * @expectedException Exception
     */
    public function test_that_over_3000_is_not_handled()
    {
        $this->romanNumerals->toRoman(3000);
    }

} 

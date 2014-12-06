<?php

class RomanNumerals
{
    private function arabicToRomanMap()
    {
        return [
            1 => 'I',
            5 => 'V',
            10 => 'X',
        ];
    }

    public function toRoman($number)
    {
        if (!$this->inBoundaries($number))
            throw new Exception();

        $arabicToRomanMap = $this->arabicToRomanMap();

        return $arabicToRomanMap[$number];
    }

    private function inBoundaries($number)
    {
        return $number ==! 0 && $number < 3000;
    }

}

class RomanNumeralsTest extends PHPUnit_Framework_TestCase {

    public function setUp()
    {
        $this->romanNumerals = new RomanNumerals();
    }

    public function romanProvider()
    {
        return [
            ['I', 1],
            ['V', 5],
            ['X', 10],
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

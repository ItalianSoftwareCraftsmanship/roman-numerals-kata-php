<?php

class RomanNumeralsTest extends PHPUnit_Framework_TestCase {

    /**
     * @expectedException Exception
     */
    public function test_that_zero_is_not_handled()
    {
        $this->toRoman(0);
    }

    /**
     * @expectedException Exception
     */
    public function test_that_over_3000_is_not_handled()
    {
        $this->toRoman(3001);
    }

    public function test_that_can_translate_one()
    {
        $this->assertToRomanNumber('I', 1);
    }

    public function test_that_can_translate_five()
    {
        $this->assertToRomanNumber('V', 5);
    }

    private function toRoman($number)
    {
        if (!$this->inBoundaries($number))
            throw new Exception();

        if ($number === 1)
            return 'I';

        return 'V';
    }

    private function inBoundaries($number)
    {
        return $number ==! 0 && $number < 3000;
    }

    private function assertToRomanNumber($expectedRomanNumber, $arabicNumber)
    {
        $this->assertEquals($expectedRomanNumber, $this->toRoman($arabicNumber));
    }

} 
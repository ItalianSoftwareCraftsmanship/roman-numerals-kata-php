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

        if (isset($arabicToRomanMap[$number]))
            return $arabicToRomanMap[$number];

        $arabic = '';
        for ($i = 0; $i < $number; $i++)
            $arabic .= 'I';

        return $arabic;
    }

    private function inBoundaries($number)
    {
        return $number ==! 0 && $number < 3000;
    }

} 
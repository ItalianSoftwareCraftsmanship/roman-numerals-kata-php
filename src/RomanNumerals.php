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

        $arabicMapNumbers = array_keys($arabicToRomanMap);

        $arabic = '';
        for ($i = 0; $i < $number; $i++)
            $arabic .= 'I';

        return $arabic;
    }

    public function nearest($number)
    {
        $arabicToRomanMap = array_keys($this->arabicToRomanMap());

        $nearest = 1000;
        foreach ($arabicToRomanMap as $mapElement) {
            $currentDistance = abs($number - $mapElement);

            if ($currentDistance < $nearest) {
                $nearest = $currentDistance;
                $min = $mapElement;
            }
        }

        return $min;
    }

    private function inBoundaries($number)
    {
        return $number ==! 0 && $number < 3000;
    }

} 

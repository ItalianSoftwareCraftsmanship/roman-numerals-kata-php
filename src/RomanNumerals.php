<?php

class RomanNumerals
{

    private function arabicToRomanMap()
    {
        return [
            1 => 'I',
            5 => 'V',
            10 => 'X',
            50 => 'L',
            100 => 'C',
            500 => 'D',
            1000 => 'M'
        ];
    }

    public function toRoman($number)
    {
        if (!$this->inBoundaries($number))
            throw new Exception();

        $arabicToRomanMap = $this->arabicToRomanMap();

        if (isset($arabicToRomanMap[$number]))
            return $arabicToRomanMap[$number];

        $nearest = $this->nearest($number);
        $difference = $number - $nearest;

        if ($difference < 0) {
            return $this->toRoman(abs($difference)) . $arabicToRomanMap[$nearest];
        }

        return $arabicToRomanMap[$nearest] . $this->toRoman($difference);
    }

    private function nearest($number)
    {
        $arabicToRomanMap = array_keys($this->arabicToRomanMap());

        $nearest = null;
        foreach ($arabicToRomanMap as $mapElement) {
            $currentDistance = abs($number - $mapElement);

            if ($nearest === null || $currentDistance < $nearest) {
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

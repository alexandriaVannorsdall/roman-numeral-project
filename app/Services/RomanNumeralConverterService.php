<?php

namespace App\Services;

class RomanNumeralConverterService
{
    /**
     * @var int[]
     */
    protected array $lookup = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    /**
     * @param $num
     * @return string
     */
    public function convertToRoman($num): string
    {
        $roman = '';
        foreach ($this->lookup as $symbol => $value) {
            // Determine the number of matches
            $matches = intval($num / $value);

            // Add the same number of symbols to the roman representation
            $roman .= str_repeat($symbol, $matches);

            // Subtract that from the number
            $num = $num % $value;
        }
        return $roman;
    }

    /**
     * @param $roman
     * @return int
     */
    public function convertToNumber($roman): int
    {
        $num = 0;
        $prev_value = 0;
        // Process the Roman numeral string from right to left
        foreach (array_reverse(str_split($roman)) as $char) {
            $value = $this->lookup[$char];

            // If the current value is less than the previous one, we should subtract
            if ($value < $prev_value) {
                $num -= $value;
            } else {
                $num += $value;
            }
            $prev_value = $value;
        }
        return $num;
    }
}


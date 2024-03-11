<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\RomanNumeralConverterService;

class RomanNumeralController extends Controller
{
    /**
     * @var RomanNumeralConverterService
     */
    protected RomanNumeralConverterService $converter;

    /**
     * @param RomanNumeralConverterService $converter
     */
    public function __construct(RomanNumeralConverterService $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Convert int to Roman numeral
     * @param Request $request
     * @return JsonResponse
     */
    public function convertToRoman(Request $request): JsonResponse
    {
        $request->validate(['number' => 'required|integer|min:1']); // Basic validation
        $romanNumeral = $this->converter->convertToRoman($request->input('number'));
        return response()->json(['roman' => $romanNumeral]);
    }

    /**
     * Convert Roman numeral to int
     * @param Request $request
     * @return JsonResponse
     */
    public function convertToNumber(Request $request): JsonResponse
    {
        $request->validate(['roman' => 'required|string']); // Basic validation
        $number = $this->converter->convertToNumber($request->input('roman'));
        return response()->json(['number' => $number]);
    }
}


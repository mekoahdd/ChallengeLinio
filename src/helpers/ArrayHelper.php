<?php
/**
 * Created by PhpStorm.
 * User: abarranco
 * Date: 30/04/18
 * Time: 03:43 PM
 */

namespace Helpers;

class ArrayHelper
{
    /**
     * Calculate all modules of all values in the array
     * the values with zero module are replaced by 1
     * and the others by an empty string
     *
     * Note: this function keeps index reference
     *
     * @access static
     * @param array $numbersArray
     * @param int $divider
     * @return Array
     */

    public static function calculateModuleAllValues(Array $numbersArray , int $divider ){
        $resultModule = [];
        $i = 0;
        foreach($numbersArray as $key => $number){
            $resultModule[$key]  = (string)!($number % $divider);
        }
        return $resultModule;
    }

    /**
     * Replace all occurrences of $searchValue with the $replaceValue in the array
     *
     * Note: this function keeps index reference
     *
     * @access static
     * @param mixed $searchValue
     * @param mixed $replaceValue
     * @param array $arrayValues
     * @return Array
     */

    public static function findAndReplaceAllValues($searchValue , $replaceValue ,Array $arrayValues){
        $replacedKeys =  array_keys($arrayValues,$searchValue,TRUE);
        foreach ($replacedKeys as $keyValue){
            $arrayValues[$keyValue] = $replaceValue;
        }
        return $arrayValues;
    }

    /**
     * Concatenates all arrays size n
     *
     * Note: this function keeps index reference
     *
     * @access static
     * @param array ...
     * @return Array
     */

    public static function concatArrays(){
        $allArrays = func_get_args();
        $resultConcatArray = [];
        foreach ($allArrays as $array){
            foreach ($array as $key => $value){
                @$resultConcatArray[$key] .= $value; // add @ to php notice undefined index use other if
            }
        }
        return $resultConcatArray;
    }
}
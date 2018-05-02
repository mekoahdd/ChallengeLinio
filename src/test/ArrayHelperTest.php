<?php
/**
 * Created by PhpStorm.
 * User: abarranco
 * Date: 2/05/18
 * Time: 10:52 AM
 */

use PHPUnit\Framework\TestCase;
use Helpers\ArrayHelper;

class ArrayHelperTest extends TestCase
{

    public function additionProvider()
    {
        return [
            [[1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15]],
            [[0, 0, 0]],
            [[0, 1, Null]],
            [[1, 'Abarranco', 1]],
        ];
    }

    /**
     * @dataProvider additionProvider
     */
    public function testCalculateModuleAllValues($array)
    {
        $this->assertSame(
            ['','','','','1','','','','','1','','','','','1'],
            ArrayHelper::calculateModuleAllValues($array,5)
        );
    }

    /**
     * @dataProvider additionProvider
     */
    public function testFindAndReplaceAllValues($array)
    {

        $this->assertSame(
            [0,1,'NULL'],
            ArrayHelper::findAndReplaceAllValues(null,'NULL',$array)
        );
    }

    /**
     * @dataProvider additionProvider
     */
    public function testConcatArrays($array)
    {
        $this->assertSame(
            ['00','11',''],
            ArrayHelper::concatArrays($array,$array)
        );
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: abarranco
 * Date: 2/05/18
 * Time: 10:52 AM
 */
use PHPUnit\Framework\TestCase;
use Exec\ChallengeLinio;

class ChallengeLinioTest extends TestCase
{


    /**
     * @dataProvider additionProvider
     */
    public function testGetProcessedMessages($array)
    {
        $object = new ChallengeLinio();
        $object->setMessages([
            '3' => 'Linio',
            '5' => 'IT',
            '35' => 'Linianos'
            ]);
        $object->setDividers([3,5]);
        $object->setNumberSeries($array);
        $this->assertSame(
            [1,2,'Linio',4,'IT','Linio',7,8,'Linio','IT',11,'Linio',13,14,'Linianos'],
            $object->getProcessedMessages()
        );
    }

    public function additionProvider()
    {
        return [
            [[1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15]],
            [[0, 0, 0]],
            [[0, 1, Null]],
            [[1, 'Abarranco', 1]],
        ];
    }
}

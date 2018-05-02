<?php
/**
 * Created by PhpStorm.
 * User: abarranco
 * Date: 30/04/18
 * Time: 04:09 PM
 */



require (__DIR__.'/../vendor/autoload.php');

use Exec\ChallengeLinio;

    $challenge = new ChallengeLinio();

    $challenge->setMessages([
        '3'  => 'Linio',
        '5'  => 'IT' ,
        '35' => 'Linianos',
    ]);

    $challenge->setDividers([
        3,5
    ]);

    $challenge->setNumberSeries(range(1,100));

    $challenge->run();
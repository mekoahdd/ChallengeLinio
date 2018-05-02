<?php
/**
 * Created by PhpStorm.
 * User: abarranco
 * Date: 30/04/18
 * Time: 04:47 PM
 */
namespace Exec;
use Helpers\ArrayHelper;

class ChallengeLinio
{

    /**
     * Messages to print
     *
     * @var array
     */
    protected $messages;

    /**
     * Dividers to challenge
     *
     * @var array
     */
    protected $dividers;

    /**
     * Number series to challenge
     *
     * @var array
     */
    protected $numberSeries;

    /**
     * Dividers processed
     *
     * @var array
     */
    private $resultDividers;


    /**
     * Setter property messages
     *
     * @param array $messagesArray
     * @return void
     */

    public function setMessages(Array $messagesArray){
        $this->messages = $messagesArray;
    }

    /**
     * Setter property dividers
     *
     * @param array $dividers
     * @return void
     */
    public function setDividers(Array $dividers){
        $this->dividers = $dividers;
    }

    /**
     * Setter property numberSeries
     *
     * @param array $numberSeries
     * @return void
     */
    public function setNumberSeries(Array $numberSeries){
        $this->numberSeries = $numberSeries;
    }

    /**
     * Process dividers with number series
     *
     * @param int $divider
     * @return array
     */
    protected function processNumbersLinio(int $divider){
         return ArrayHelper::findAndReplaceAllValues('1',$divider,
                    ArrayHelper::calculateModuleAllValues($this->numberSeries,$divider));
    }

    /**
     * Process all dividers
     *
     * @return void
     */
    protected function processDividers(){
        $this->resultDividers = [];
        foreach ($this->dividers as $key =>  $divider) {
            $this->resultDividers[$key] = $this->processNumbersLinio($divider);
        }

    }


    /**
     * Process number series message
     *
     * @return array
     */
    public function getProcessedMessages(){
        $resultMessages = [];
        $this->processDividers();
        $keysMessages = ArrayHelper::concatArrays(...$this->resultDividers);
        foreach ($this->numberSeries as $key => $number) {
            $message = $number;
            if(!empty($keysMessages[$key])){  // This is the only if
                $message = $this->messages[$keysMessages[$key]];
            }
            $resultMessages[$key] = $message;
        }
        return $resultMessages;
    }


    /**
     * Method print number series challenge Linio
     * Output in console
     */
    public function run(){
        $processedMessages = $this->getProcessedMessages();
        foreach ($processedMessages as $message) {
            echo PHP_EOL.$message;
        }
    }


}
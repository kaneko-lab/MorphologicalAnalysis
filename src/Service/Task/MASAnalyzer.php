<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 16:21
 */

namespace App\Service\Task;


use App\ValueObject\MAResult;

abstract class MASAnalyzer {

    protected $_isSuccess = false;
    protected $_targetMessage = null;
    protected $_errorMessage = null;
    /**
     * @var MAResult
     */
    protected $_result = null;


    /**
     * @param $message
     */
    public function __construct($message){
        $this->_targetMessage = $message;
    }

    /**
     * @return mixed
     */
    abstract public function execute();

    abstract protected function getTestResult();

    public function isSuccess(){
        return $this->_isSuccess;
    }

    public function getErrorMessage(){
        return $this->_errorMessage;
    }

    /**
     * @return MAResult
     */
    public function getResult(){
        return $this->_result;
    }





}
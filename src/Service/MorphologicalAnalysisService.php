<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 13:29
 */

namespace App\Service;


use App\Constant\RESULT_CODE;
use App\ValueObject\ServiceResult;

class MorphologicalAnalysisService implements  Service{
    private $_lang;
    private $_message;
    private $_serviceResult;

    /**
     * @param $message
     */
    public function setMessage($message){
        $this->_message = $message;

    }

    /**
     * @param $lang
     */
    public function setLang($lang){
        $this->_lang = $lang;
    }

    public function doAnalysis(){

        $parameterService = new ParameterService();
        if(!$parameterService->checkLanguage($this->_lang)||!$parameterService->checkMessage($this->_message)){
            $this->_serviceResult = $parameterService->getServiceResult();
            return false;
        }
        $this->_serviceResult = new ServiceResult(RESULT_CODE::SUCCESS);
    }

    /**
     * @return ServiceResult
     */
    public function getServiceResult(){
        return $this->_serviceResult;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 13:29
 */

namespace App\Service;


use App\Constant\LANG_TYPE;
use App\Constant\RESULT_CODE;
use App\Service\Task\MASAnalyzer;
use App\Service\Task\MecabAnalyzer;
use App\Service\Task\MecabKoAnalyzer;
use App\Service\Task\RDRPOSTaggerEnAnalyzer;
use App\Service\Task\RDRPOSTaggerThaiAnalyzer;
use App\Service\Task\RDRPOSTaggerVietnameseAnalyzer;
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

    /**
     * @return bool
     */
    public function doAnalysis(){

        $parameterService = new ParameterService();
        if(!$parameterService->checkLanguage($this->_lang)||!$parameterService->checkMessage($this->_message)){
            $this->_serviceResult = $parameterService->getServiceResult();
            return false;
        }


        $analyser = $this->getCurrentAnalyser($this->_lang,$this->_message);
        if($analyser == null){
            $this->_serviceResult = new ServiceResult(RESULT_CODE::CANNOT_FIND_ANALYZER);
            return false;
        }
        $analyser->execute();
        if($analyser->isSuccess() == false){
            $this->_serviceResult = new ServiceResult(RESULT_CODE::FAILED_TO_EXECUTE_ANALYZER);
            $this->_serviceResult->setData($analyser->getErrorMessage());
            $this->log("Failed to execute analyzer.");
            $this->log("Message : ".$this->_message." Lang : " . $this->_lang);
            $this->log("Error Message : ".$analyser->getErrorMessage());
            return false;
        }else{
            $this->_serviceResult = new ServiceResult(RESULT_CODE::SUCCESS);
            $this->_serviceResult->setData($analyser->getResult()->getArray());
            return true;
        }


    }

    /**
     * @param $lang
     * @param $message
     * @return MASAnalyzer|null
     */
    private function getCurrentAnalyser($lang,$message){
        switch ($lang){
            case LANG_TYPE::JAPANESE: return new MecabAnalyzer($message);
            case LANG_TYPE::KOREAN: return new MecabKoAnalyzer($message);
            case LANG_TYPE::ENGLISH: return new RDRPOSTaggerEnAnalyzer($message);
            case LANG_TYPE::VIETNAMESE : return new RDRPOSTaggerVietnameseAnalyzer($message);
            case LANG_TYPE::THAI:return new RDRPOSTaggerThaiAnalyzer($message);
            default : return null;
        }
    }


    /**
     * @return ServiceResult
     */
    public function getServiceResult(){
        return $this->_serviceResult;
    }
}
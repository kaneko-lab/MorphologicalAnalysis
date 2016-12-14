<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 13:51
 */

namespace App\Service;


use App\Constant\RESULT_CODE;
use App\ValueObject\ServiceResult;

class ParameterService implements Service{
    private $_isSuccessParameterChecking = true;
    private $_resultCode = RESULT_CODE::SUCCESS ;


    /**
     * @param $lang
     * @return bool
     */
    public function checkLanguage($lang){
        switch ($lang)  {
            case 'en': $parameterChecking = true; break;
            case 'ko': $parameterChecking = true; break;
            default : $parameterChecking = false; break;
        }

        if($parameterChecking == false){
            $this->_isSuccessParameterChecking = false;
            $this->_resultCode = RESULT_CODE::UNSUPPORTED_LANG;
        }

        return $this->_isSuccessParameterChecking;
    }

    /**
     * @param $message
     * @return bool
     */
    public function checkMessage($message){
        if($message == null){
            $this->_isSuccessParameterChecking = false;
            $this->_resultCode = RESULT_CODE::MESSAGE_IS_NULL;
        }
        return $this->_isSuccessParameterChecking;
    }


    public function getServiceResult(){
        return new ServiceResult($this->_resultCode);
    }



}
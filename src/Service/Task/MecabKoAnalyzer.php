<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 16:45
 */

namespace App\Service\Task;


use App\Constant\LANG_TYPE;
use App\ValueObject\MAResult;
use Cake\Core\Configure;


class MecabKoAnalyzer implements MASAnalyzer{
    private $_isSuccess = false;
    private $_targetMessage = null;
    private $_errorMessage = null;
    private $_result = null;
    public function __construct($message){
        $this->_targetMessage = $message;
    }

    public function isSuccess(){
        return $this->_isSuccess;
    }

    public function getErrorMessage(){
        return $this->_errorMessage;
    }


    public function execute(){
        //Run CMD
        $cmd  = Configure::read('ANALYZER_PATH.MECAB_KO');
        //Run Test Mode
        if($cmd == null){
            //Get raw result
            $result = $this->getTestResult();
        }else{
            $result = shell_exec('echo "'.$this->_targetMessage.'" | '.$cmd.'  ');
        }

        $this->_result = new MAResult($this->_targetMessage,LANG_TYPE::JAPANESE);
        $this->_result->setOriginalAnalysisResult($result);
        //Create MAResult
        //1.Explode by new line
        $resultArray1 =  preg_split("/\\r\\n|\\r|\\n/", $result);
        foreach($resultArray1 as $wordAndPartString){
            $wordAndPartArray = preg_split('/\s+/', $wordAndPartString);
            if(strpos($wordAndPartArray[0],"EOS")!==false)
                break;

            $word = $wordAndPartArray[0];
            $part = $wordAndPartArray[1];
            $this->_result->addWord($word,$part);
        }
        $this->_isSuccess = true;

    }

    public function getResult(){
        return $this->_result;
    }

    private function getTestResult(){
        return "mecab	SL,*,*,*,*,*,*,*
-	SY,*,*,*,*,*,*,*
ko	SL,*,*,*,*,*,*,*
-	SY,*,*,*,*,*,*,*
dic	SL,*,*,*,*,*,*,*
은	JX,*,T,은,*,*,*,*
MeCab	SL,*,*,*,*,*,*,*
을	JKO,*,T,을,*,*,*,*
사용	NNG,*,T,사용,*,*,*,*
하	XSV,*,F,하,*,*,*,*
여	EC,*,F,여,*,*,*,*
,	SC,*,*,*,*,*,*,*
한국어	NNG,*,F,한국어,Compound,*,*,한국/NNG/*+어/NNG/*
형태소	NNG,*,F,형태소,Compound,*,*,형태/NNG/*+소/NNG/*
분석	NNG,*,T,분석,*,*,*,*
을	JKO,*,T,을,*,*,*,*
하	VV,*,F,하,*,*,*,*
기	ETN,*,F,기,*,*,*,*
위한	VV+ETM,*,T,위한,Inflect,VV,ETM,위하/VV/*+ᆫ/ETM/*
프로젝트	NNG,*,F,프로젝트,*,*,*,*
입니다	VCP+EF,*,F,입니다,Inflect,VCP,EF,이/VCP/*+ᄇ니다/EF/*
.	SF,*,*,*,*,*,*,*
EOS
";
    }

}
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


class MecabAnalyzer implements MASAnalyzer{
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
        $cmdPath  = Configure::read('ANALYZER_PATH.MECAB');
        //Run Test Mode
        if($cmdPath == null){
            //Get raw result
            $result = $this->getTestResult();
        }else{
            $result = shell_exec('echo "'.$this->_targetMessage.'" | '.$cmdPath.'  -Osimple');
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
        return "すもも	名詞-一般
も	助詞-係助詞
もも	名詞-一般
も	助詞-係助詞
もも	名詞-一般
の	助詞-連体化
うち	名詞-非自立-副詞可能
EOS
";
    }

}
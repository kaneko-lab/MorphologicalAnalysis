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


class RDRPOSTaggerEnAnalyzer implements MASAnalyzer{
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
        $cmd  = Configure::read('ANALYZER_PATH.RDRPOS_TAGGER');
        //Run Test Mode
        if($cmd == null){
            //Get raw result
            $result = $this->getTestResult();
        }else{
            //Create file on tmp directory
            $tmpFolder=TMP;
            $fname=LANG_TYPE::ENGLISH.'_'.uniqid().'.wd';
            $inputFile=$tmpFolder.DS.$fname;
            $fp=fopen($inputFile,"w");
            fwrite($fp,$this->_targetMessage);
            fclose($fp);
            $SCRDRtaggerDir = "/usr/local/src/RDRPOSTagger";
            $pSCRDRtaggerDir = $SCRDRtaggerDir.DS."pSCRDRtagger";
            $cmd = "cd {$pSCRDRtaggerDir} && /usr/local/bin/python2.7 {$pSCRDRtaggerDir}/RDRPOSTaggerPrint.py tag {$SCRDRtaggerDir}/Models/POS/English.RDR {$SCRDRtaggerDir}/Models/POS/English.DICT " .$inputFile;
            $result = shell_exec($cmd);
            unlink($inputFile);

        }

        $this->_result = new MAResult($this->_targetMessage,LANG_TYPE::ENGLISH);
        $this->_result->setOriginalAnalysisResult($result);
        //Create MAResult
        //1.Explode by new line - Delete new line.
        $resultArray1 =  preg_split('/\s+/', $result);

        foreach($resultArray1 as $wordAndPartString){

            $wordAndPartArray = preg_split('/\//', $wordAndPartString);
            if(empty($wordAndPartArray[0]))
                continue;

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
        return "This/DT is/VBZ english/NN test./NN";
    }

}
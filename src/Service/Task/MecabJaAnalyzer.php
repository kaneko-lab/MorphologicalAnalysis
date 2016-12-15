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


class MecabJaAnalyzer extends  MASAnalyzer{



    public function execute(){
        //Run CMD
        $cmdPath  = Configure::read('ANALYZER_PATH.MECAB');
        //Run Test Mode
        if($cmdPath == null){
            //Get raw result
            $result = $this->getTestResult();
        }else{
            $result = shell_exec('echo "'.$this->_targetMessage.'" | '.$cmdPath.' -F"%m\t%h,%H\n" -E"EOS\n" ');
        }

        $this->_result = new MAResult($this->_targetMessage,LANG_TYPE::JAPANESE);
        $this->_result->setOriginalAnalysisResult($result);
        $converter = new MecabJaConverter();

        //Create MAResult
        //1.Explode by new line
        $resultArray1 =  preg_split("/\\r\\n|\\r|\\n/", $result);
        foreach($resultArray1 as $wordAndPartString){
            $wordAndPartArray = preg_split('/\s+/', $wordAndPartString);
            if(strpos($wordAndPartArray[0],"EOS")!==false)
                break;
            if(empty($wordAndPartArray[0]))
                continue;

            $word = $wordAndPartArray[0];
            $part = $wordAndPartArray[1];
            $partPOS = preg_split('/,/',$part)[0];

            $this->_result->addWord($word,$part,$converter->convert($partPOS));
        }
        $this->_isSuccess = true;

    }

    protected function getTestResult(){
        return "すもも	38,名詞,一般,*,*,*,*,すもも,スモモ,スモモ
も	16,助詞,係助詞,*,*,*,*,も,モ,モ
もも	38,名詞,一般,*,*,*,*,もも,モモ,モモ
も	16,助詞,係助詞,*,*,*,*,も,モ,モ
もも	38,名詞,一般,*,*,*,*,もも,モモ,モモ
の	24,助詞,連体化,*,*,*,*,の,ノ,ノ
うち	66,名詞,非自立,副詞可能,*,*,*,うち,ウチ,ウチ
EOS
";
    }

}

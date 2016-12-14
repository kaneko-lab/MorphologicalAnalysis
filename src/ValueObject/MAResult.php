<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 16:49
 * Result for Morphological Analysis
 */

namespace App\ValueObject;


class MAResult {
    private $_originalMessage = null;
    private $_lang = null;
    private $_originalAnalysisResult = null;
    private $_wordList = array();

    public function __construct($message,$lang){
        $this->_originalMessage = $message;
        $this->_lang = $lang;
    }


    /**
     * @param $originalData
     */
    public function setOriginalAnalysisResult($originalData){
        $this->_originalAnalysisResult = $originalData;
    }

    /**
     * @param $word
     * @param $part
     */
    public function addWord($word,$part){
        $this->_wordList[]=array('WORD'=>$word,'PART'=>$part);

    }

    /**
     * @return array
     */
    public function getArray(){
        return
            array(
                'LANG'=>$this->_lang,
                'ORIGINAL_MESSAGE'=>$this->_originalMessage,
                'ANALYSIS_ORIG_RESULT'=>$this->_originalAnalysisResult,
                'ANALYSIS_RESULT'=>$this->_wordList);
    }
}
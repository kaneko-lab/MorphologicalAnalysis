<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/15
 * Time: 11:49
 */

namespace App\Service\Task;


use App\Constant\POS_SIMPLE_TYPE;

class RDRPOSTaggerEnConverter {

    public function convert($pos)
    {
        switch ($pos) {
            case    "UNKNOWN" :
                return POS_SIMPLE_TYPE::ETC;    //	不明な語
            case    "DT"    :
                return POS_SIMPLE_TYPE::ETC;    //	限定詞
            case    "QT"    :
                return POS_SIMPLE_TYPE::ADJECTIVE;    //	数量詞
            case    "CD"    :
                return POS_SIMPLE_TYPE::ETC;    //	基数
            case    "NN"    :
                return POS_SIMPLE_TYPE::NOUN;    //	名詞 (単数形)
            case    "NNS"   :
                return POS_SIMPLE_TYPE::NOUN;    //	名詞 (複数形)
            case    "NNP"   :
                return POS_SIMPLE_TYPE::NOUN;    //	固有名詞 (単数形)
            case    "NNPS"  :
                return POS_SIMPLE_TYPE::NO;    //	固有名詞 (複数形)
            case    "EX"    :
                return POS_SIMPLE_TYPE::ETC;    //	存在を表す there (例文: There was a party.)
            case    "PRP"   :
                return POS_SIMPLE_TYPE::ETC;    //	人称代名詞 (PP)
            case    "PRP$"  :
                return POS_SIMPLE_TYPE::ETC;    //	所有代名詞 (PP$)
            case    "POS"   :
                return POS_SIMPLE_TYPE::ETC;    //	所有格の終わり
            case    "RBS"   :
                return POS_SIMPLE_TYPE::ADVERB;    //	副詞 (最上級)
            case    "RBR"   :
                return POS_SIMPLE_TYPE::ADVERB;    //	副詞 (比較級)
            case    "RB"    :
                return POS_SIMPLE_TYPE::ADVERB;    //	副詞
            case    "JJS"   :
                return POS_SIMPLE_TYPE::ADJECTIVE;    //	形容詞 (最上級)
            case    "JJR"   :
                return POS_SIMPLE_TYPE::ADJECTIVE;    //	形容詞 (比較級)
            case    "JJ"    :
                return POS_SIMPLE_TYPE::ADJECTIVE;    //	形容詞
            case    "MD"    :
                return POS_SIMPLE_TYPE::ETC;    //	法
            case    "VB"    :
                return POS_SIMPLE_TYPE::VERB;    //	動詞 (原形)
            case    "VBP"   :
                return POS_SIMPLE_TYPE::VERB;    //	動詞 (三人称単数以外の現在形)
            case    "VBZ"   :
                return POS_SIMPLE_TYPE::VERB;    //	動詞 (三人称単数の現在形)
            case    "VBD"   :
                return POS_SIMPLE_TYPE::VERB;    //	動詞 (過去形)
            case    "VBN"   :
                return POS_SIMPLE_TYPE::VERB;    //	動詞 (過去分詞)
            case    "VBG"   :
                return POS_SIMPLE_TYPE::VERB;    //	動詞 (動名詞または現在分詞)
            case    "WDT"   :
                return POS_SIMPLE_TYPE::ETC;    //	Wh 限定詞 (例えば Which book do you like better? という文の中の which)
            case    "WP"    :
                return POS_SIMPLE_TYPE::ETC;    //	Wh 代名詞 (例えば関係代名詞として使用される場合の which および that)
            case    "WP$"   :
                return POS_SIMPLE_TYPE::PRONOUN;    //	所有 Wh 代名詞 (例えば whose)
            case    "WRB"   :
                return POS_SIMPLE_TYPE::ADVERB;    //	Wh 副詞 (例えば I like it when you make dinner for me. という文の中の when )
            case    "TO"    :
                return POS_SIMPLE_TYPE::ETC;    //	前置詞 to
            case    "IN"    :
                return POS_SIMPLE_TYPE::ETC;    //	前置詞または従属接続詞
            case    "CC"    :
                return POS_SIMPLE_TYPE::ETC;    //	等位接続詞
            case    "UH"    :
                return POS_SIMPLE_TYPE::INTERJECTION;    //	感嘆詞
            case    "RP"    :
                return POS_SIMPLE_TYPE::ETC;    //	不変化詞
            case    "SYM"   :
                return POS_SIMPLE_TYPE::ETC;    //	記号
            default :
                return POS_SIMPLE_TYPE::ETC;
        }
    }
}
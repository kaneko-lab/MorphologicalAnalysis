<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/15
 * Time: 10:28
 */

namespace App\Service\Task;


use App\Constant\POS_SIMPLE_TYPE;

class MecabKoConverter implements POSTypeConverter {
    public function convert($pos){
        switch ($pos){
            case "NNG" : return POS_SIMPLE_TYPE::NOUN; //일반 명사
            case "NNP" : return POS_SIMPLE_TYPE::NOUN; //고유 명사
            case "NNB" : return POS_SIMPLE_TYPE::NOUN; //의존 명사
            case "NNBC": return POS_SIMPLE_TYPE::NOUN; //단위 명사
            case "NR"  : return POS_SIMPLE_TYPE::ADJECTIVE; //수사
            case "NP"  : return POS_SIMPLE_TYPE::PRONOUN; //대명사
            case "VV"  : return POS_SIMPLE_TYPE::VERB; //동사
            case "VA"  : return POS_SIMPLE_TYPE::ADJECTIVE; //형용사
            case "VX" : return POS_SIMPLE_TYPE::ETC; //보조용언
            case "VCP" : return POS_SIMPLE_TYPE::ETC; //긍정 지지사
            case "VCN" : return POS_SIMPLE_TYPE::ETC; //부정 지지사
            case "MM" : return POS_SIMPLE_TYPE::ADJECTIVE; //관형사
            case "MAG" : return POS_SIMPLE_TYPE::ADVERB; //일반 부사
            case "MAJ" : return POS_SIMPLE_TYPE::ADVERB; //접속 부사
            case "IC" : return POS_SIMPLE_TYPE::INTERJECTION; //감탄사
            case "JKS" : return POS_SIMPLE_TYPE::ETC; //주격 조사
            case "JKC" : return POS_SIMPLE_TYPE::ETC; //보격 조사
            case "JKG" : return POS_SIMPLE_TYPE::ETC; //관형격 조사
            case "JKO" : return POS_SIMPLE_TYPE::ETC; //목적격 조사
            case "JKB" : return POS_SIMPLE_TYPE::ETC; //부사격 조사
            case "JKV" : return POS_SIMPLE_TYPE::ETC; //호격 조사
            case "JKQ" : return POS_SIMPLE_TYPE::ETC; //인용격 조사
            case "JX" : return POS_SIMPLE_TYPE::ETC; //보조사
            case "JC" : return POS_SIMPLE_TYPE::ETC; //접속 조사
            case "EP" : return POS_SIMPLE_TYPE::ETC; //선어말 어미
            case "EF" : return POS_SIMPLE_TYPE::ETC; //종결 어미
            case "EC" : return POS_SIMPLE_TYPE::ETC; //연결 어미
            case "ETN" : return POS_SIMPLE_TYPE::ETC; //명사형 전성 어미
            case "ETM" : return POS_SIMPLE_TYPE::ETC; //관형형 전성 어미
            case "XPN" : return POS_SIMPLE_TYPE::ETC; //체언 접두사
            case "XSN" : return POS_SIMPLE_TYPE::ETC; //명사 파생 접미사
            case "XSV" : return POS_SIMPLE_TYPE::ETC; //동사 파생 접미사
            case "XSA" : return POS_SIMPLE_TYPE::ETC; //형용사 파생 접미사
            case "XR" : return POS_SIMPLE_TYPE::ETC; //어근
            case "SF" : return POS_SIMPLE_TYPE::ETC; //마침표, 물음표, 느낌표
            case "SE" : return POS_SIMPLE_TYPE::ETC; //줄임표 …
            case "SSO" : return POS_SIMPLE_TYPE::ETC; //여는 괄호 (, [
            case "SSC" : return POS_SIMPLE_TYPE::ETC; //닫는 괄호 ), ]
            case "SC" : return POS_SIMPLE_TYPE::ETC; //구분자 , · / :
            case "SY" : return POS_SIMPLE_TYPE::ETC; //기호
            case "SL" : return POS_SIMPLE_TYPE::ETC; //외국어
            case "SH" : return POS_SIMPLE_TYPE::ETC; //한자
            case "SN" : return POS_SIMPLE_TYPE::ETC; //숫자
            default : return POS_SIMPLE_TYPE::ETC;


        }
    }
}
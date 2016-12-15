<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/15
 * Time: 10:28
 */

namespace App\Service\Task;


use App\Constant\POS_SIMPLE_TYPE;

/**
 * 品詞IDの定義
 *https://taku910.github.io/mecab/posid.html
 * その他,間投,*,* 0
フィラー,*,*,* 1
感動詞,*,*,* 2
記号,アルファベット,*,* 3
記号,一般,*,* 4
記号,括弧開,*,* 5
記号,括弧閉,*,* 6
記号,句点,*,* 7
記号,空白,*,* 8
記号,読点,*,* 9
形容詞,自立,*,* 10
形容詞,接尾,*,* 11
形容詞,非自立,*,* 12
助詞,格助詞,一般,* 13
助詞,格助詞,引用,* 14
助詞,格助詞,連語,* 15
助詞,係助詞,*,* 16
助詞,終助詞,*,* 17
助詞,接続助詞,*,* 18
助詞,特殊,*,* 19
助詞,副詞化,*,* 20
助詞,副助詞,*,* 21
助詞,副助詞／並立助詞／終助詞,*,* 22
助詞,並立助詞,*,* 23
助詞,連体化,*,* 24
助動詞,*,*,* 25
接続詞,*,*,* 26
接頭詞,形容詞接続,*,* 27
接頭詞,数接続,*,* 28
接頭詞,動詞接続,*,* 29
接頭詞,名詞接続,*,* 30
動詞,自立,*,* 31
動詞,接尾,*,* 32
動詞,非自立,*,* 33
副詞,一般,*,* 34
副詞,助詞類接続,*,* 35
名詞,サ変接続,*,* 36
名詞,ナイ形容詞語幹,*,* 37
名詞,一般,*,* 38
名詞,引用文字列,*,* 39
名詞,形容動詞語幹,*,* 40
名詞,固有名詞,一般,* 41
名詞,固有名詞,人名,一般 42
名詞,固有名詞,人名,姓 43
名詞,固有名詞,人名,名 44
名詞,固有名詞,組織,* 45
名詞,固有名詞,地域,一般 46
名詞,固有名詞,地域,国 47
名詞,数,*,* 48
名詞,接続詞的,*,* 49
名詞,接尾,サ変接続,* 50
名詞,接尾,一般,* 51
名詞,接尾,形容動詞語幹,* 52
名詞,接尾,助数詞,* 53
名詞,接尾,助動詞語幹,* 54
名詞,接尾,人名,* 55
名詞,接尾,地域,* 56
名詞,接尾,特殊,* 57
名詞,接尾,副詞可能,* 58
名詞,代名詞,一般,* 59
名詞,代名詞,縮約,* 60
名詞,動詞非自立的,*,* 61
名詞,特殊,助動詞語幹,* 62
名詞,非自立,一般,* 63
名詞,非自立,形容動詞語幹,* 64
名詞,非自立,助動詞語幹,* 65
名詞,非自立,副詞可能,* 66
名詞,副詞可能,*,* 67
連体詞,*,*,* 68
 * Class MecabJaConverter
 * @package App\Service\Task
 */

class MecabJaConverter implements POSTypeConverter {
    public function convert($pos){
        switch ($pos){
            case	0	:	return POS_SIMPLE_TYPE::ETC; //その他,間投,*,* 0
            case	1	:	return POS_SIMPLE_TYPE::ETC; //フィラー,*,*,* 1
            case	2	:	return POS_SIMPLE_TYPE::INTERJECTION; //感動詞,*,*,* 2
            case	3	:	return POS_SIMPLE_TYPE::ETC;    //記号,アルファベット,*,* 3
            case	4	:	return POS_SIMPLE_TYPE::ETC;	//	記号,一般,*,* 4
            case	5	:	return POS_SIMPLE_TYPE::ETC;	//	記号,括弧開,*,* 5
            case	6	:	return POS_SIMPLE_TYPE::ETC;	//	記号,括弧閉,*,* 6
            case	7	:	return POS_SIMPLE_TYPE::ETC;	//	記号,句点,*,* 7
            case	8	:	return POS_SIMPLE_TYPE::ETC;	//	記号,空白,*,* 8
            case	9	:	return POS_SIMPLE_TYPE::ETC;	//	記号,読点,*,* 9
            case	10	:	return POS_SIMPLE_TYPE::ADJECTIVE;	//	形容詞,自立,*,* 10
            case	11	:	return POS_SIMPLE_TYPE::ADJECTIVE;	//	形容詞,接尾,*,* 11
            case	12	:	return POS_SIMPLE_TYPE::ADJECTIVE;	//	形容詞,非自立,*,* 12
            case	13	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,格助詞,一般,* 13
            case	14	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,格助詞,引用,* 14
            case	15	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,格助詞,連語,* 15
            case	16	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,係助詞,*,* 16
            case	17	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,終助詞,*,* 17
            case	18	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,接続助詞,*,* 18
            case	19	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,特殊,*,* 19
            case	20	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,副詞化,*,* 20
            case	21	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,副助詞,*,* 21
            case	22	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,副助詞／並立助詞／終助詞,*,* 22
            case	23	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,並立助詞,*,* 23
            case	24	:	return POS_SIMPLE_TYPE::ETC;	//	助詞,連体化,*,* 24
            case	25	:	return POS_SIMPLE_TYPE::VERB;	//	助動詞,*,*,* 25
            case	26	:	return POS_SIMPLE_TYPE::CONJUNCTION;	//	接続詞,*,*,* 26
            case	27	:	return POS_SIMPLE_TYPE::CONJUNCTION;	//	接頭詞,形容詞接続,*,* 27
            case	28	:	return POS_SIMPLE_TYPE::CONJUNCTION;	//	接頭詞,数接続,*,* 28
            case	29	:	return POS_SIMPLE_TYPE::CONJUNCTION;	//	接頭詞,動詞接続,*,* 29
            case	30	:	return POS_SIMPLE_TYPE::CONJUNCTION;	//	接頭詞,名詞接続,*,* 30
            case	31	:	return POS_SIMPLE_TYPE::VERB;	//	動詞,自立,*,* 31
            case	32	:	return POS_SIMPLE_TYPE::VERB;	//	動詞,接尾,*,* 32
            case	33	:	return POS_SIMPLE_TYPE::VERB;	//	動詞,非自立,*,* 33
            case	34	:	return POS_SIMPLE_TYPE::ADVERB;	//	副詞,一般,*,* 34
            case	35	:	return POS_SIMPLE_TYPE::ADVERB;	//	副詞,助詞類接続,*,* 35
            case	36	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,サ変接続,*,* 36
            case	37	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,ナイ形容詞語幹,*,* 37
            case	38	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,一般,*,* 38
            case	39	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,引用文字列,*,* 39
            case	40	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,形容動詞語幹,*,* 40
            case	41	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,固有名詞,一般,* 41
            case	42	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,固有名詞,人名,一般 42
            case	43	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,固有名詞,人名,姓 43
            case	44	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,固有名詞,人名,名 44
            case	45	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,固有名詞,組織,* 45
            case	46	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,固有名詞,地域,一般 46
            case	47	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,固有名詞,地域,国 47
            case	48	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,数,*,* 48
            case	49	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接続詞的,*,* 49
            case	50	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,サ変接続,* 50
            case	51	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,一般,* 51
            case	52	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,形容動詞語幹,* 52
            case	53	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,助数詞,* 53
            case	54	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,助動詞語幹,* 54
            case	55	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,人名,* 55
            case	56	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,地域,* 56
            case	57	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,特殊,* 57
            case	58	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,接尾,副詞可能,* 58
            case	59	:	return POS_SIMPLE_TYPE::PRONOUN;	//	名詞,代名詞,一般,* 59
            case	60	:	return POS_SIMPLE_TYPE::PRONOUN;	//	名詞,代名詞,縮約,* 60
            case	61	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,動詞非自立的,*,* 61
            case	62	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,特殊,助動詞語幹,* 62
            case	63	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,非自立,一般,* 63
            case	64	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,非自立,形容動詞語幹,* 64
            case	65	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,非自立,助動詞語幹,* 65
            case	66	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,非自立,副詞可能,* 66
            case	67	:	return POS_SIMPLE_TYPE::NOUN;	//	名詞,副詞可能,*,* 67
            case	68	:	return POS_SIMPLE_TYPE::ETC;	//	連体詞,*,*,* 68
            default:return POS_SIMPLE_TYPE::ETC;

        }
    }
}
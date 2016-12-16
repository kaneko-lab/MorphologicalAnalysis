<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/15
 * Time: 11:49
 */

namespace App\Service\Task;


use App\Constant\POS_SIMPLE_TYPE;

class RDRPOSTaggerViConverter {

    public function convert($pos)
    {
        switch ($pos) {
            case "CC": return POS_SIMPLE_TYPE::CONJUNCTION;			//	CC (Coordinating conjunction
            case "CD": return POS_SIMPLE_TYPE::ADJECTIVE;			//	CD (Cardinal number
            case "DT": return POS_SIMPLE_TYPE::ETC;			//	DT (Determiner
            case "V": return POS_SIMPLE_TYPE::VERB;			//	EX (Existential
            case "FW": return POS_SIMPLE_TYPE::ETC;			//	FW (Foreign word
            case "IN": return POS_SIMPLE_TYPE::ETC;			//	IN (Preposition
            case "A": return POS_SIMPLE_TYPE::ADJECTIVE;			//	JJ (Adjective
            case "LS": return POS_SIMPLE_TYPE::ETC;			//	LS (List item marker
            case "MD": return POS_SIMPLE_TYPE::ETC;			//	MD (Modal
            case "N": return POS_SIMPLE_TYPE::NOUN;			//	NN (Noun, singular or mass
            case "P": return POS_SIMPLE_TYPE::PRONOUN;			//	PP (Personal pronoun
            case "R": return POS_SIMPLE_TYPE::ADVERB;			//	RB (Adverb
            case "RP": return POS_SIMPLE_TYPE::ETC;			//	RP (Particle
            case "SYM": return POS_SIMPLE_TYPE::ETC;			//	SYM (Symbol
            case "UH": return POS_SIMPLE_TYPE::INTERJECTION;			//	UH (Interjection
            default :
                return POS_SIMPLE_TYPE::ETC;
        }
    }
}
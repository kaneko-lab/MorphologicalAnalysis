<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/15
 * Time: 11:49
 */

namespace App\Service\Task;


use App\Constant\POS_SIMPLE_TYPE;

class RDRPOSTaggerThConverter {

    public function convert($pos)
    {
        switch ($pos) {
            case "NPRP": return POS_SIMPLE_TYPE::PRONOUN;
            case "NCNM": return POS_SIMPLE_TYPE::ADJECTIVE;
            case "NLBL": return POS_SIMPLE_TYPE::NOUN;
            case "NCMN": return POS_SIMPLE_TYPE::NOUN;
            case "NTTL": return POS_SIMPLE_TYPE::NOUN;
            default :return POS_SIMPLE_TYPE::ETC;
        }
    }
}
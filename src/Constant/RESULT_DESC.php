<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/04
 * Time: 18:11
 */

namespace App\Constant;


class RESULT_DESC {
    public static function get($RESULT_CODE)
    {
        switch($RESULT_CODE){
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";

            case RESULT_CODE::AUTH_FAILED: return "Check you  auth info.";

            case RESULT_CODE::UNSUPPORTED_LANG : return "The language is not supported.";

            case RESULT_CODE::MESSAGE_IS_NULL : return "Message can not be null.";

            case RESULT_CODE::CANNOT_FIND_ANALYZER : return "Cannot find analyzer. Check your language.";

            case RESULT_CODE::FAILED_TO_EXECUTE_ANALYZER: return "Failed to execute analyzer. See log for detail.";

            /*
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            case RESULT_CODE::SUCCESS: return "Successfully finished your request.";
            */
            return "UNKNOWN CODE FOR DESCRIPTION " . $RESULT_CODE;
        }
    }
}
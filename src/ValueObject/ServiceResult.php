<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 13:25
 */

namespace App\ValueObject;


use App\Constant\RESULT_DESC;
use App\Constant\ARRAY_KEY;

class ServiceResult {
    protected $_resultCode;
    protected $_resultDesc;
    protected $_data = null;

    public function __construct($resultCode){
        $this->_resultCode = $resultCode;
        $this->_resultDesc = RESULT_DESC::get($resultCode);
    }

    function setData($data)
    {
        $this->_data = $data;
    }

    function getCode()
    {
        return $this->_resultCode;
    }

    function getArray()
    {
        return (
        [
            ARRAY_KEY::RESULT_CODE => $this->_resultCode,
            ARRAY_KEY::RESULT_DESC => $this->_resultDesc,
            ARRAY_KEY::RESULT_DATA => $this->_data]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/04
 * Time: 15:28
 */
namespace App\Service;
use App\Constant\RESULT_CODE;
use App\Model\Entity\Group;
use App\Model\Table\GroupsTable;
use App\ValueObject\ServiceResult;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;


class AuthService implements Service{
    private $_isValidated = false;
    private $_resultCode = null;
    public function isValidAuth($auth = null)
    {
        $this->_isValidated =  ( $auth == "Xidkexo121xlaAadkxidg")?true:false;
        $this->_resultCode = ($this->_isValidated)?RESULT_CODE::SUCCESS:RESULT_CODE::AUTH_FAILED;
        return $this->_isValidated;
    }

    public function getServiceResult(){
        return new ServiceResult($this->_resultCode);
    }
}
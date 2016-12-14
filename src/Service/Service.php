<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 13:52
 */

namespace App\Service;


use App\ValueObject\ServiceResult;

interface Service {
    /**
     * @return ServiceResult
     */
    function getServiceResult();

}
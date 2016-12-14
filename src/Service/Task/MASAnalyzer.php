<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/14
 * Time: 16:21
 */

namespace App\Service\Task;


use App\ValueObject\MAResult;

interface MASAnalyzer {
    public function __construct($message);
    public function isSuccess();
    public function getErrorMessage();
    public function execute();

    /**
     * @return MAResult
     */
    public function getResult();
}
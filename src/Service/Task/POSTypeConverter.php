<?php
/**
 * Created by PhpStorm.
 * User: jung
 * Date: 16/12/15
 * Time: 10:26
 */

namespace App\Service\Task;


interface POSTypeConverter {
    public function convert($pos);
}
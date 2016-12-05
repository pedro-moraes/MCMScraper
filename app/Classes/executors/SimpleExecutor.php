<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 05/12/2016
 * Time: 03:59
 */

namespace app\Classes;


class SimpleExecutor extends AbstractExecutor
{
    public function execute()
    {
        return $this->executable->doJob();
    }
}
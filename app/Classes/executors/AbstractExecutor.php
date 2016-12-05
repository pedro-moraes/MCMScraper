<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 05/12/2016
 * Time: 03:58
 */

namespace app\Classes;


abstract class AbstractExecutor
{

    protected $executable;

    public function __construct(Executable $executable){
        $this->executable=$executable;
    }

    /*
     *  Executor is responsible for dealing with errorrecovery and errorlogging
     */

    public abstract function execute();

}
<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 05/12/2016
 * Time: 04:32
 */

namespace app\Classes;


abstract class AbstractScraper
{

    protected $crawlerExecutor;
    protected $parserExecutor;

    public abstract function scrapeIt();

}
<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 02:08
 */

namespace app\Classes;

interface CrawlerAPI{

    public function init();
    public function getUrl($url);
    public function postToUrl($post,$url);
    public function doJob();
    public function close();
}
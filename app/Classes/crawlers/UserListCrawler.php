<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 01:47
 */

namespace app\Classes;


class UserListCrawler extends AbstractCurlCrawler
{

    private $url="www.magiccardmarket.eu/Users";

    public function doJob(){

        $this->init();
        $html=$this->getUrl($this->url);
        $this->close();

        return $html;
    }
}
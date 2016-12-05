<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 05/12/2016
 * Time: 03:04
 */

namespace app\Classes\crawlers;


use app\Classes\AbstractCurlCrawler;

class MagicCardsTableCrawler extends AbstractCurlCrawler
{


    public function doJob()
    {
      $html=$this->getUrl($this->url);
      return $html;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 01:22
 */

namespace app\Classes;



class MCMUserListScraper extends AbstractScraper
{

    public function scrapeIt(){

        $this->crawlerExecutor= new SimpleExecutor(new UserListCrawler());
        $userListHtmlBlock=$this->crawlerExecutor->execute();
        $this->parserExecutor=new SimpleExecutor(new UserTableParser($userListHtmlBlock));
        return $this->parserExecutor->execute();
    }

}
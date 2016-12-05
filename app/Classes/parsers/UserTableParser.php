<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 01:39
 */

namespace app\Classes;


use Carbon\Carbon;

class UserTableParser extends AbstractParser{

        public function doJob(){

            $this->init();
            $this->loadDOM($this->data);

            /*
             * <table class="MKMTable sellers-table block">
             * <tbody>
             *  <tr>
             *      1º<td> Name <td><span class="horList nowrap"><span class="horListItem"><a href="/Users/Dunkler-Herrscher">Dunkler-Herrscher</a></span></span></td>
             *      7º<td> Sales <td>58626</td>
             *      8º<td> Articles, href with userId <td><a href="/?mainPage=browseUserProducts&amp;idUser=14633">1426064</a></td>
             */

            $entries=$this->evalXPathQuery("//table[@class='MKMTable sellers-table block']/tbody//tr");

            foreach($entries as $entry){

                $Node['active']=1;
                $Node['username']=$this->evalXPathQuery("./td[1]//a/text()",$entry)->item(0)->nodeValue;
                $Node['sales']=$this->evalXPathQuery("./td[7]/text()",$entry)->item(0)->nodeValue;

                $articleNodeAux=$this->evalXPathQuery("./td[8]/a",$entry);
                $result=$this->extractIntNumbers($articleNodeAux->item(0)->attributes->item(0)->nodeValue);

                $Node['mcmid']=$result;
                $Node['articles']=$articleNodeAux->item(0)->nodeValue;
                $Node['created_at']=$this->now();
                $Node['updated_at']=$this->now();

                $Nodes[]=$Node;
            }

           return json_encode($Nodes);
        }
}
<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 01:49
 */

namespace app\Classes;


class UserCardPricesTableParser extends AbstractParser
{

    public function doJob()
    {
        $this->init();
        $this->loadDOM($this->data);

        /*
         *<table class="MKMTable specimenTable MKMSortable">
            <tbody>
              <tr>
                <td 3> //<a>card name </a>
                <td 4> //<span onmouseover="showMsgBox('Kaladesh')">
                <td 5> //<span onmouseover="showMsgBox('Rare')">
                <td 6> //<span onmouseover="showMsgBox('English')">
                <td 13>		<td class="algn-r nowrap">0,29 €</td>
         *
         *
         */

        $entries=$this->evalXPathQuery("//table[@class='MKMTable specimenTable MKMSortable']//tr");

        foreach($entries as $entry){

            $node['card_name']=$this->evalXPathQuery("/td[3]//a/text",$entry);

            $node['expansion_name']=str_replace("'","",$this->extractStringBetweenBrackets(
                $this->evalXPathQuery("/td[4]//span/@onmouseover/text",$entry)));

            $node['rarity']=str_replace("'","",$this->extractStringBetweenBrackets(
                $this->evalXPathQuery("/td[5]//span/@onmouseover/text",$entry)));

            $node['language']=str_replace("'","",$this->extractStringBetweenBrackets(
                $this->evalXPathQuery("/td[6]//span/@onmouseover/text",$entry)));

            $node['card_price']=$this->extractFloatNumbers($this->evalXPathQuery("/td[13]/text"));
            $node['created_at']=$this->now();

            $nodes[]=$node;
        }

        return json_encode($nodes);
    }
}
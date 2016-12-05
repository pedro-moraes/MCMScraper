<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 05/12/2016
 * Time: 00:37
 */

namespace app\Classes\parsers;


use app\Classes\AbstractParser;

class MagicCardsTableParser extends AbstractParser
{

    public function doJob()
    {
        //Must be the same as DB Rarities
        $rarities=array('Land'=>0,'Common'=>1,'Uncommon'=>2,'Rare'=>3,'Mythic Rare'=>4);

        /*
         * <table cellpadding="3" cellspacing="0" width="100%">
         *  <tr class="even">
                <td align="right">1</td>
                <td><a href="/som/en/1.html">Abuna Acolyte</a></td>
                <td>Creature — Cat Cleric 1/1</td>
                <td>1W</td>
                <td>Uncommon</td>
                <td>Igor Kieryluk</td>
                <td><img src="http://magiccards.info/images/en.gif" alt="English" width="16" height="11" class="flag2"> Scars of Mirrodin</td>
              </tr>
         *
         *
         */

        $this->init();
        $this->loadDOM($this->data);

        $entries=$this->evalXPathQuery("//table[@cellpadding='3']//tr[//td]");

        foreach($entries as $entry){

            $Card['name']=$this->evalXPathQuery(".//td[2]/text()",$entry)->item(0)->nodeValue;
            $Card['rarity']=$rarities[$this->evalXPathQuery(".//td[5]/text()",$entry)->item(0)->nodeValue];

            $Cards[]=$Card;
        }

        return json_encode($Cards);
    }

}
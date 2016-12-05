<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 05/12/2016
 * Time: 03:00
 */

namespace app\Classes\scrapers;


use app\Classes\AbstractScraper;
use app\Classes\crawlers\MagicCardsTableCrawler;
use app\Classes\parsers\MagicCardsTableParser;
use app\Classes\SimpleExecutor;

class MagicCardsSetsScraper extends AbstractScraper
{


    private $magicSets =array(
        array("Expansion"=>"Kaladesh","Url"=>"http://magiccards.info/kld/en.html","load"=>'1'),
        array("Expansion"=>"Eldritch Moon","Url"=>"http://magiccards.info/emn/en.html","load"=>'1'),
        array("Expansion"=>"Shadows over Innistrad","Url"=>"http://magiccards.info/soi/en.html","load"=>'1'),
        array("Expansion"=>"Oath of the Gatewatch","Url"=>"http://magiccards.info/ogw/en.html","load"=>'1'),
        array("Expansion"=>"Battle for Zendikar","Url"=>"http://magiccards.info/bfz/en.html","load"=>'1'),
        array("Expansion"=>"Dragons of Tarkir","Url"=>"http://magiccards.info/dtk/en.html","load"=>'1'),
        array("Expansion"=>"Fate Reforged","Url"=>"http://magiccards.info/frf/en.html","load"=>'1'),
        array("Expansion"=>"Khans of Tarkir","Url"=>"http://magiccards.info/ktk/en.html","load"=>'1'),
        array("Expansion"=>"Journey into Nyx","Url"=>"http://magiccards.info/jou/en.html","load"=>'1'),
        array("Expansion"=>"Born of the Gods","Url"=>"http://magiccards.info/bng/en.html","load"=>'1'),
        array("Expansion"=>"Theros","Url"=>"http://magiccards.info/ths/en.html","load"=>'1'),
        array("Expansion"=>"Dragon's Maze","Url"=>"http://magiccards.info/dgm/en.html","load"=>'1'),
        array("Expansion"=>"Gatecrash","Url"=>"http://magiccards.info/gtc/en.html","load"=>'1'),
        array("Expansion"=>"Return to Ravnica","Url"=>"http://magiccards.info/rtr/en.html","load"=>'1'),
        array("Expansion"=>"Avacyn Restored","Url"=>"http://magiccards.info/avr/en.html","load"=>'1'),
        array("Expansion"=>"Dark Ascension","Url"=>"http://magiccards.info/dka/en.html","load"=>'1'),
        array("Expansion"=>"Innistrad","Url"=>"http://magiccards.info/isd/en.html","load"=>'1'),
        array("Expansion"=>"New Phyrexia","Url"=>"http://magiccards.info/nph/en.html","load"=>'1'),
        array("Expansion"=>"Mirrodin Besieged","Url"=>"http://magiccards.info/mbs/en.html","load"=>'1'),
        array("Expansion"=>"Scars of Mirrodin","Url"=>"http://magiccards.info/som/en.html","load"=>'1'),
        array("Expansion"=>"Rise of the Eldrazi","Url"=>"http://magiccards.info/roe/en.html","load"=>'1'),
        array("Expansion"=>"Worldwake","Url"=>"http://magiccards.info/wwk/en.html","load"=>'1'),
        array("Expansion"=>"Zendikar","Url"=>"http://magiccards.info/zen/en.html","load"=>'1'),
        array("Expansion"=>"Alara Reborn","Url"=>"http://magiccards.info/arb/en.html","load"=>'1'),
        array("Expansion"=>"Conflux","Url"=>"http://magiccards.info/cfx/en.html","load"=>'1'),
        array("Expansion"=>"Shards of Alara","Url"=>"http://magiccards.info/ala/en.html","load"=>'1'),
        array("Expansion"=>"Eventide","Url"=>"http://magiccards.info/eve/en.html","load"=>'1'),
        array("Expansion"=>"Shadowmoor","Url"=>"http://magiccards.info/shm/en.html","load"=>'1'),
        array("Expansion"=>"Morningtide","Url"=>"http://magiccards.info/mt/en.html","load"=>'1'),
        array("Expansion"=>"Lorwyn","Url"=>"http://magiccards.info/lw/en.html","load"=>'1'),
        array("Expansion"=>"Future Sight","Url"=>"http://magiccards.info/fut/en.html","load"=>'1'),
        array("Expansion"=>"Planar Chaos","Url"=>"http://magiccards.info/pc/en.html","load"=>'1'),
        array("Expansion"=>"Time Spiral","Url"=>"http://magiccards.info/ts/en.html","load"=>'1'),
        array("Expansion"=>"Time Spiral Timeshifted","Url"=>"http://magiccards.info/tsts/en.html","load"=>'1'),
        array("Expansion"=>"Coldsnap","Url"=>"http://magiccards.info/cs/en.html","load"=>'1'),
        array("Expansion"=>"Alliances","Url"=>"http://magiccards.info/ai/en.html","load"=>'1'),
        array("Expansion"=>"Ice Age","Url"=>"http://magiccards.info/ia/en.html","load"=>'1'),
        array("Expansion"=>"Dissension","Url"=>"http://magiccards.info/di/en.html","load"=>'1'),
        array("Expansion"=>"Guildpact","Url"=>"http://magiccards.info/gp/en.html","load"=>'1'),
        array("Expansion"=>"Ravnica: City of Guilds","Url"=>"http://magiccards.info/rav/en.html","load"=>'1'),
        array("Expansion"=>"Saviors of Kamigawa","Url"=>"http://magiccards.info/sok/en.html","load"=>'1'),
        array("Expansion"=>"Betrayers of Kamigawa","Url"=>"http://magiccards.info/bok/en.html","load"=>'1'),
        array("Expansion"=>"Champions of Kamigawa","Url"=>"http://magiccards.info/chk/en.html","load"=>'1'),
        array("Expansion"=>"Fifth Dawn","Url"=>"http://magiccards.info/5dn/en.html","load"=>'1'),
        array("Expansion"=>"Darksteel","Url"=>"http://magiccards.info/ds/en.html","load"=>'1'),
        array("Expansion"=>"Mirrodin","Url"=>"http://magiccards.info/mi/en.html","load"=>'1'),
        array("Expansion"=>"Scourge","Url"=>"http://magiccards.info/sc/en.html","load"=>'1'),
        array("Expansion"=>"Legions","Url"=>"http://magiccards.info/le/en.html","load"=>'1'),
        array("Expansion"=>"Onslaught","Url"=>"http://magiccards.info/on/en.html","load"=>'1'),
        array("Expansion"=>"Judgment","Url"=>"http://magiccards.info/ju/en.html","load"=>'1'),
        array("Expansion"=>"Torment","Url"=>"http://magiccards.info/tr/en.html","load"=>'1'),
        array("Expansion"=>"Odyssey","Url"=>"http://magiccards.info/od/en.html","load"=>'1'),
        array("Expansion"=>"Apocalypse","Url"=>"http://magiccards.info/ap/en.html","load"=>'1'),
        array("Expansion"=>"Planeshift","Url"=>"http://magiccards.info/ps/en.html","load"=>'1'),
        array("Expansion"=>"Invasion","Url"=>"http://magiccards.info/in/en.html","load"=>'1'),
        array("Expansion"=>"Prophecy","Url"=>"http://magiccards.info/pr/en.html","load"=>'1'),
        array("Expansion"=>"Nemesis","Url"=>"http://magiccards.info/ne/en.html","load"=>'1'),
        array("Expansion"=>"Mercadian Masques","Url"=>"http://magiccards.info/mm/en.html","load"=>'1'),
        array("Expansion"=>"Urza's Destiny","Url"=>"http://magiccards.info/ud/en.html","load"=>'1'),
        array("Expansion"=>"Urza's Legacy","Url"=>"http://magiccards.info/ul/en.html","load"=>'1'),
        array("Expansion"=>"Urza's Saga","Url"=>"http://magiccards.info/us/en.html","load"=>'1'),
        array("Expansion"=>"Exodus","Url"=>"http://magiccards.info/ex/en.html","load"=>'1'),
        array("Expansion"=>"Stronghold","Url"=>"http://magiccards.info/sh/en.html","load"=>'1'),
        array("Expansion"=>"Tempest","Url"=>"http://magiccards.info/tp/en.html","load"=>'1'),
        array("Expansion"=>"Weatherlight","Url"=>"http://magiccards.info/wl/en.html","load"=>'1'),
        array("Expansion"=>"Visions","Url"=>"http://magiccards.info/vi/en.html","load"=>'1'),
        array("Expansion"=>"Mirage","Url"=>"http://magiccards.info/mr/en.html","load"=>'1'),
        array("Expansion"=>"Homelands","Url"=>"http://magiccards.info/hl/en.html","load"=>'1'),
        array("Expansion"=>"Fallen Empires","Url"=>"http://magiccards.info/fe/en.html","load"=>'1'),
        array("Expansion"=>"The Dark","Url"=>"http://magiccards.info/dk/en.html","load"=>'1'),
        array("Expansion"=>"Legends","Url"=>"http://magiccards.info/lg/en.html","load"=>'1'),
        array("Expansion"=>"Antiquities","Url"=>"http://magiccards.info/aq/en.html","load"=>'1'),
        array("Expansion"=>"Arabian Night","Url"=>"http://magiccards.info/an/en.html","load"=>'1'));


        public function scrapeIt(){

            foreach($this->magicSets as $magicSet){

                if($magicSet['load']){

                    $this->crawlerExecutor=new SimpleExecutor(new MagicCardsTableCrawler($magicSet["Url"]));
                    $Html=$this->crawlerExecutor->execute();
                    $this->parserExecutor=new SimpleExecutor(new MagicCardsTableParser($Html));
                    $CardSet=$this->parserExecutor->execute();
                }
            }

            return $CardSet;

        }
}
<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 01:55
 */

namespace app\Classes;


class TrendsTableParser extends AbstractParser {

    public  function doJob()
    {

        $this->init();
        $this->loadDOM($this->data);

        /*
         *
         * <div class="infoBlock">
	           <table class="availTable">
		            <tbody>
	    	            tr[2] from
			            tr[3] trend
			            tr[5] foilsfrom
         *
         *
         */

        $entries=$this->evalXPathQuery("//div[@class='infoBlock']/table//tr");

        $result['fromValue']=$this->evalXPathQuery("/td[2]/span[1]/text",$entries->item(1));
        $result['trendValue']=$this->extractFloatNumbers($this->evalXPathQuery("/td[2]/text",$entries->item(2)));
        $result['foilsFromValue']=$this->extractFloatNumbers($this->evalXPathQuery("/td[2]/text",$entries->item(4)));
        $result['created_at']=$this->now();

        return json_encode($result);
    }

}
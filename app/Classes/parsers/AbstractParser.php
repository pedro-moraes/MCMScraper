<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 01:40
 */

namespace app\Classes;


use Carbon\Carbon;

abstract class AbstractParser implements Executable
{

    private $document;
    private $domxpath;
    protected $data;

    public function __construct($data){
        $this->data=$data;
    }

    public abstract function doJob();

    public function init(){

        libxml_use_internal_errors(true);
    }

    public function loadDOM($data){

        $this->document= new \DOMDocument();
        $this->document->loadHTML($data);
        $this->domxpath=new \DOMXPath($this->document);
    }

    public function loadXML($data){

        $this->document= new \DOMDocument();
        $this->document->load($data);
        $this->domxpath=new \DOMXPath($this->document);
    }

    public function evalXPathQuery($query,$node=NULL){

        if($node != NULL)
            return $this->domxpath->query($query, $node);

        return $this->domxpath->query($query);
    }

    public function extractIntNumbers($data){
        preg_match("/(\d+)/", $data ,$result);
        return $result[0];
    }

    public function extractFloatNumbers($data){
        preg_match("[-+]?([0-9]*(\.|\,)[0-9]+|[0-9]+)",$data,$result);
        return $result[0];
    }

    public function extractStringBetweenBrackets($data){
        preg_match("\((.*?)\)",$data,$result);
        return $result[0];
    }

    public function now(){
        return Carbon::now('utc')->toDateTimeString();
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Zluis
 * Date: 03/12/2016
 * Time: 01:46
 */

namespace app\Classes;


abstract class AbstractCurlCrawler implements Executable
{

    private $curlHandler;
    private $ckfile;
    protected $url;

    public abstract function doJob();

    public function __construct($url=NULL)
    {
        $this->url=$url;
    }

    public function init(){

        $this->ckfile = tempnam ("/tmp", 'cookiename');
        $this->curlHandler = curl_init();
        //Set User Agent
        curl_setopt($this->curlHandler, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.149 Safari/537.36");
        //Include Header in Result
        curl_setopt($this->curlHandler, CURLOPT_HEADER, 0);
        //Return Data
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        //Timeout
        curl_setopt($this->curlHandler, CURLOPT_TIMEOUT, 20);
        //Follow Redirects
        curl_setopt($this->curlHandler , CURLOPT_FOLLOWLOCATION, 1);
        //Cookie related stuff
        curl_setopt ($this->curlHandler, CURLOPT_COOKIEJAR, $this->ckfile);
        curl_setopt ($this->curlHandler, CURLOPT_COOKIEFILE, $this->ckfile);
        //Ignore SSL
        curl_setopt($this->curlHandler, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->curlHandler, CURLOPT_SSL_VERIFYPEER, 0);
    }

    public function getUrl($url){

        curl_setopt($this->curlHandler, CURLOPT_URL, $url);
        $output = curl_exec($this->curlHandler);
        return $output;
    }

    public function postToUrl($post,$url){

        curl_setopt ($this->curlHandler, CURLOPT_POST, 1);
        curl_setopt ($this->curlHandler, CURLOPT_POSTFIELDS, $post);
        $this->getUrl($url);
    }

    public function close(){
        curl_close($this->curlHandler);
    }

}
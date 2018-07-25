<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-10
 * Time: 09:11
 */

require_once ('C:\xampp\htdocs\perm\Parameters\PathParameters.php');

class PermutationService
{
    private $downloadData;

    public function __construct(DownloadData $downloadData)
    {
        $this->downloadData=$downloadData;
    }
    function permutationService(){
        $downloadData=$this->downloadData->downloadData();
        $value=1000;
        $resultArray=$this->checkValue($downloadData,$value);
        $this->saveResult($resultArray,PathParameters::$pathResultCsv);
        return true;

    }
    function checkValue($array,$value,$actualValue=0,$actualArray=null,$resultArray=null){

        if(empty($actualValue) OR empty($actualArray)  ){
            $arrayRandom=rand(count($array));
            $randomArrayValue=$array[$arrayRandom];
            $actualValue2=$randomArrayValue;
        }
        else{
            $arrayRandom=rand(count($array));
            $randomArrayValue=$actualArray[$arrayRandom];
            $actualValue2=$actualValue+$randomArrayValue;
        }


        if($actualValue2>$value ){
            if($actualValue+min($array)>$value){
                return $this->checkValue($array,$value) ;
            }
            unset($actualArray[$arrayRandom]);
            $resultArray[]=$randomArrayValue;

            return $this->checkValue($array,$value,$actualValue,$actualArray,$resultArray );
        }
        if($value==$actualValue2 ){
            return $resultArray;
        }
        if($actualValue2<$value){
            unset($actualArray[$arrayRandom]);
            $resultArray[]=$randomArrayValue;
            return $this->checkValue($array,$value,$actualValue2,$actualArray,$resultArray );
        }

    }
    function saveResult($resultArray,$csvPath){
        $file = fopen($csvPath,"w");

        foreach ($resultArray as $line)
        {
            fputcsv($file,explode(',',$line));
        }

        fclose($file);
        return true;
    }

}
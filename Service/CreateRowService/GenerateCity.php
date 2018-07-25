<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-05
 * Time: 11:46
 */

class GenerateCity extends GeneratePersonalData
{
    public function generateData()
    {
        $cityArray=$this->generateCsvValue($this->pathCityCsv);
        $this->city=$cityArray[0];
        if(strlen($this->city)==1 ){
            return $this->generateData();
        }
        return $this;
    }
}
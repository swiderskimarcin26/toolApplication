<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-05
 * Time: 11:47
 */

class GenerateSurname extends GeneratePersonalData
{
    public function generateData()
    {
        $surnameArray=$this->generateCsvValue($this->pathSurnameCsv);
        $this->surname=$surnameArray[0];
        if($this->sex=='K' AND substr($surnameArray,-1)=='i'){
            $this->surname=substr_replace($surnameArray, "a", -1);
        }
        return $this;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-05
 * Time: 11:46
 */

class GenerateName extends GeneratePersonalData
{
    public function generateData()
    {
        $nameArray=$this->generateCsvValue($this->pathNameCsv);
        $nameLowerCase=strtolower($nameArray[1]);
        $name=strtoupper(substr($nameLowerCase,0,1)).substr($nameLowerCase,1,strlen($nameLowerCase));
        $this->name=$name;
        $this->sex=$nameArray[3];
        return $this;

    }
}
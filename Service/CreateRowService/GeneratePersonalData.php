<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-05
 * Time: 11:35
 */

abstract class GeneratePersonalData extends CreatePerson
{
    public function generateData()
    {
    }
    public function generateCsvValue($path){
        $csvExport=new CsvTool($path);
        $Array=$csvExport->openCSV($path);
        $value=array_rand($Array);
        return $Array[$value];
    }
}
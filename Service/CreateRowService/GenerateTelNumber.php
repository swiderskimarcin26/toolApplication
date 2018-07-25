<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-03
 * Time: 13:09
 */

class GenerateTelNumber extends GeneratePersonalData
{


    public function generateData()
    {
        $telNumberString="";
        for ($i = 0; $i <= 7; $i++) {
            if ($i == 0) {
                $telNumberString.=strval(rand(1,9));}
             if($i==1 or $i==4 ){
                 $telNumberString.=strval(rand(0,9)).'-';
             }
             else {
                $telNumberString.=strval(rand(0,9));
            }
        }
        $this->telNumber=$telNumberString;
        //$this->telNumber=intval($telNumberString);
        return $this;
    }

}
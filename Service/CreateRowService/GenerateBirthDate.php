<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-03
 * Time: 13:16
 */

class GenerateBirthDate extends GeneratePersonalData
{
    public function generateData()
    {
        $day = rand(1, 31);
        $month = rand(1, 12);
        $year = rand(1920, 2018);

        if (checkdate($day, $month, $year)) {
            $this->birthDate = strval($day) .'.'. strval($day).'.'. strval($year);
            return $this;
        } else {
            return $this->generateData();
        }
    }
}
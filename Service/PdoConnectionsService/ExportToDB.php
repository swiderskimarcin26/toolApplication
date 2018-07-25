<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-06
 * Time: 09:28
 */

interface ExportToDB {

    public function dBConnection();
    public function exportRow($arrayPerson,$personObject);

}
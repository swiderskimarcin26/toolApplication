<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-05
 * Time: 08:53
 */

require_once( 'C:\xampp\htdocs\perm\Parameters\PathParameters.php' );
require_once('C:\xampp\htdocs\perm\Service\CreateRowService\CreatePerson.php');
require_once('C:\xampp\htdocs\perm\Service\PdoConnectionsService\ExportPersonDB.php');
require_once('C:\xampp\htdocs\perm\Service\PdoConnectionsService\ExportToDB.php');
class CreateRow
{
    private $rowNumber;
    private $saveMode;

    public function __construct($rowNumber, $saveMode)
    {
        $this->rowNumber = $rowNumber;
        $this->saveMode = $saveMode;
    }

    public function createRows()
    {
        $rowNumber=$this->rowNumber;
        $i = 0;
        while (++$i <= $rowNumber) {
            $createPerson = new CreatePerson(PathParameters::$pathNameCsv,PathParameters::$pathCityCsv,PathParameters::$pathSurnameCsv);
            $createPerson->createPersons();
            $rowArray[] = $createPerson;
            echo(count($rowArray));
        }
        $exportPersonDB= new ExportPersonDB;
        $exportPersonDB->exportRow($rowArray,new CreatePerson(PathParameters::$pathNameCsv,PathParameters::$pathCityCsv,PathParameters::$pathSurnameCsv) );
        return $rowArray;
    }

}
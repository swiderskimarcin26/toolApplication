<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-06
 * Time: 09:54
 */

require_once ('C:\xampp\htdocs\perm\Service\PdoConnectionsService\ExportToDB.php');
require_once ('C:\xampp\htdocs\perm\Service\PdoConnectionsService\PdoConnection.php');
require_once ('C:\xampp\htdocs\perm\Parameters\DataBaseParameters.php');


class ExportPersonDB implements ExportToDB
{

    public function dBConnection(){
        $pdoConnection=new PdoConnection(DataBaseParameters::$dataBaseParameter);
        $connection=$pdoConnection->databaseConnection();
        return $connection;
    }
    public function exportRow($arrayPerson,$personObject){
        $columnArray=['name','surname','sex','city','email','adress','number','birthDay'];
        $tableName='person';
        foreach ($columnArray as $column ){
            $columnName.=$column.', ';
        }
        $Persons="";
        foreach ($arrayPerson as $Person){
            $Persons.=', ( '."'".$Person->getName()."'".', '
                ."'".$Person->getSurname()."'".', '
                ."'".$Person->getSex()."'".', '
                ."'".$Person->getCity()."'".', '
                ."'".$Person->getEmail()."'". ', '
                ."'".$Person->getAdress()."'". ', '
                ."'".$Person->getTelNumber()."'".', '
                ."'".$Person->getBirthDate()."'".')';
//            $Persons.=', ( '.$Person->getName().', '
//                .$Person->getSurname().', '
//                .$Person->getSex().', '
//                .$Person->getCity().', '
//                .$Person->getEmail(). ', '
//                .$Person->getTelNumber().', '
//                .$Person->getBirthDate().')';
        }
        $Persons=substr($Persons, 1);
        $sqlQuery='Insert Into'." ".$tableName
        .' ( '.$columnName.') '
        .'VALUES'.$Persons;
        $sqlQuery;
//        'INSERT INTO MyTable ( Column1, Column2, Column3 )
//        VALUES ('John', 123, 'Lloyds Office'),
//            ('Jane', 124, 'Lloyds Office'),
//        ('Billy', 125, 'London Office'),
//        ('Miranda', 126, 'Bristol Office')';
        $connection=$this->dBConnection();
        try{
        $sth = $connection->prepare($sqlQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();}
        catch(PDOException $e)
        {
            echo 'Wystapil blad biblioteki PDO: ' . $e->getMessage();
        }
    }

}
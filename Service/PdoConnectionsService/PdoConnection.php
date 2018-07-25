<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-18
 * Time: 13:56
 */

class PdoConnection
{

    private $dataBaseParameter;
    private $dB;
    public function __construct($dataBaseParameter,$dB)
    {
        $this->dataBaseParameter=$dataBaseParameter;
        $this->dB=$dB;
    }
    function databaseConnection(){
        $dataBaseParameter=$this->dataBaseParameter;
        $hostname=$dataBaseParameter['host'];
        $username=$dataBaseParameter['username'];
        $password=$dataBaseParameter['password'];
        $dbName=$this->dB;

        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
            echo 'Connected to Database<br/>';
            $a=$dbh->query("SELECT id,Val FROM permutation")->fetchAll();
            return $a;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }
    function closeDB($dbh){
        return $dbh=null;
    }

}
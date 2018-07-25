<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-10
 * Time: 08:44
 */

require_once('C:\xampp\htdocs\perm\Parameters\DataBaseParameters.php');
require_once('C:\xampp\htdocs\perm\Service\PdoConnectionsService\PdoConnection.php');

class DownloadData
{   private $table;

    public function __construct($table,$dB)
    {
        $this->table=$table;
        $this->dB=$dB;

    }

    function downloadData()
    {
        $table=$this->table;
        $dB=$this->dB;
        $PDO = new PdoConnection(DataBaseParameters::$dataBaseParameter,$dB);
        try {
            $PDO = new PdoConnection(DataBaseParameters::$dataBaseParameter,$dB);

            $stmt =$PDO->databaseConnection();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $stmt;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-18
 * Time: 13:37
 */


class CsvTool
{

    private $csvFilePath;
    private $dataBaseParameter;

    public function __construct($csvFilePath,$dataBaseParameter=Null)
    {
        $csvFilePath=$this->csvFilePath;
        $dataBaseParameter=$this->dataBaseParameter;
    }
    function openCSV($csvFilePath){


        //$data=$this->rcp($csvFilePath);
        $handle = fopen($csvFilePath, 'r');

            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE)
            {

                    $data[] = $row;
            }
            fclose($handle);



//        $file = $csvFilePath;
//
//        $delimiter = ',';
//        $csv_file = new SplFileObject($file);
//        $csv_file->setFlags(SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
//        $csv_file->setCsvControl($delimiter);
//
//        /**
//         * Process each line from the CSV file
//         */
//        while ($csv_file->current() !== false) {
//            $csvArray[] = trim($csv_file->current());
//            $csv_file->next();
//        }

            return $data;
    }

    function exportCsvToDb($csvArray,$dataBaseParameter)
    {
        $columnNames = 'Val';
        $dataToInsert = array();
        $tableName = DataBaseParameters::$dataBaseParameter['table'] ;
        foreach ($csvArray as $row => $data) {
            foreach ($data as $value=> $data2){
                $insertValue.="($data2),";
            }
        }
        $insertValue2=rtrim($insertValue,",");

        $sql="INSERT INTO $tableName ($columnNames) VALUES".$insertValue2;

        try {
                        $PdoConnection= new PdoConnection($dataBaseParameter);
                        $dbConnect=$PdoConnection->databaseConnection($dataBaseParameter);
                        $dbConnect->exec($sql);
                    } catch (PDOException $e) {
                        echo"$e";
                    }
    }
    function rcp($plik){
        $buf="";

        $pl=fopen($plik, "r");
        if(!$pl) return;
        while(!feof($pl)) $buf.=fread($pl, 100000);
        fclose($pl);

        $buf=iconv("WINDOWS-1250", "UTF-8", $buf);

        $pl=fopen($plik, "w");
        if(!$pl) return;
        fwrite($pl, $buf);
        fclose($pl);
    }
}
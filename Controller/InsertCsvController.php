<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-19
 * Time: 10:32
 */


class InsertCsvController extends Controller
{
    private $path;
    private $dBParameter;

    public function __construct()
    {
    }

    public static function insertCsvController()
    {
        $path=$GLOBALS['argv'][2];
        $dBParameter=DataBaseParameters::$dataBaseParameter;
        $csvExport = new CsvTool($path, $dBParameter);
        $csvArray = $csvExport->openCSV($path);
        $exportCsvToDb = $csvExport->exportCsvToDb($csvArray, $dBParameter);
    }
}
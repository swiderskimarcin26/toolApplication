<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-19
 * Time: 10:32
 */


class CreateRowController extends Controller
{


    public function __construct()
    {
    }

    public static function createRowController()
    {
        $rowNumber=$GLOBALS['argv'][2];
        $saveMode= $GLOBALS['argv'][3];
        $createRowsService= new CreateRow($rowNumber,$saveMode);
        $rowArray=$createRowsService->createRows();

        return $rowArray;
    }

}
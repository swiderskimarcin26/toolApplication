<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-19
 * Time: 09:49
 */


Route::set('InsertCsvController', function (){
    //InsertCsvController::viewCreated('InsertCsvView');
    InsertCsvController::insertCsvController();
});
Route::set('CreateRowController', function (){
    //InsertCsvController::viewCreated('InsertCsvView');
    CreateRowController::createRowController();
});
Route::set('PermController', function (){
PermController::permController();
});
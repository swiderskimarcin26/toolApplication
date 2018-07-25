<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-19
 * Time: 10:32
 */
require_once( 'C:\xampp\htdocs\perm\Controller\Controller.php' );
require_once( 'C:\xampp\htdocs\perm\Service\PermService\DownloadData.php' );
require_once( 'C:\xampp\htdocs\perm\Service\PermService\PermutationService.php' );

class PermController extends Controller
{
    public function __construct()
    {
    }

    public static function PermController()
    {
        //$rowNumber=$GLOBALS['argv'][2];
        //$saveMode= $GLOBALS['argv'][3];
        $table="permutation";
        $dB="permutation";
        $downloadData= new DownloadData($table,$dB);
        $permutationService= new PermutationService($downloadData);
        $permutation=$permutationService->permutationService();

        return true;
    }

}
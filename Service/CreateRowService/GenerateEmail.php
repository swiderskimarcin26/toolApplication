<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-07-03
 * Time: 11:52
 */

class GenerateEmail extends GeneratePersonalData
{
    private $domainArray=['gmail.com','home.pl','wp.pl','poczta.onet.pl','o2.pl','gazeta.pl','yahoo.com','tlen.pl','vp.pl'];
    private $algorytm=['first','second','third','fourth','fifth'];


    private function firstAlgorythm($domain){

        $name=$this->name;
        $surname=$this->surname;

        $email=$name.$surname.'@'.$domain;
        return $email;
    }
    private function secondAlgorythm($domain){
        $name=$this->name;
        $surname=$this->surname;
        $birthDate = new DateTime($this->birthDate);
        $today=new DateTime();
        $age=$today->diff($birthDate)->format('Y');

        $email=$name.$surname.$age.'@'.$domain;
        return $email;
    }
    private function thirdAlgorythm($domain){
        $name=$this->name;
        $surname=$this->surname;
        $email=$name[0].'.'.$surname.'@'.$domain;
        return $email;
    }
    private function fourthAlgorythm($domain){
        $name=$this->name;
        $surname=$this->surname;
        $birthDate = new DateTime($this->birthDate);
        $today=new DateTime();
        $age=$today->diff($birthDate)->y;

        $email=$surname.$name.$age.'@'.$domain;
        return $email;
    }
    private function fifthAlgorythm($domain){
        $name=$this->name;
        $surname=$this->surname;
        $birthDate = new DateTime($this->birthDate);
        $today=new DateTime();
        $age=$today->diff($birthDate)->y;
        $email=$surname.'.'.$name[0].$age.'@'.$domain;
        return $email;
    }
    //sprawdzić czy po stworzeniu obiektu można odwoływać się do jego atrybutów
    public function generateData(){
        $domain=$this->domainArray[array_rand($this->domainArray)];
        $algorythNumber=$this->algorytm[array_rand($this->algorytm)];
        $functionName=$algorythNumber.'Algorythm';
        $this->email=self::$functionName($domain);
        return $this;
    }
}
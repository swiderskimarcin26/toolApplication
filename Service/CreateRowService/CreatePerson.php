<?php
/**
 * Created by PhpStorm.
 * User: marcin2
 * Date: 2018-06-26
 * Time: 08:36
 */
require_once ('C:\xampp\htdocs\perm\Service\CreateRowService/GeneratePersonalData.php');
require_once('C:\xampp\htdocs\perm\Service\CreateRowService/GenerateName.php');
require_once('C:\xampp\htdocs\perm\Service\CreateRowService/GenerateEmail.php');
require_once('C:\xampp\htdocs\perm\Service\CreateRowService/GenerateSurname.php');
require_once('C:\xampp\htdocs\perm\Service\CreateRowService/GenerateCity.php');
require_once('C:\xampp\htdocs\perm\Service\CreateRowService/GenerateTelNumber.php');
require_once('C:\xampp\htdocs\perm\Service\CreateRowService/GenerateBirthDate.php');


class CreatePerson
{
    protected $pathNameCsv;
    protected $pathCityCsv;
    protected $pathSurnameCsv;

    public $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
    protected $surname;

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $name
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    protected $sex;

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $name
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
    }

    protected $telNumber;

    /**
     * @return mixed
     */
    public function getTelNumber()
    {
        return $this->telNumber;
    }

    /**
     * @param mixed $telNumber
     */
    public function setTelNumber($telNumber): void
    {
        $this->telNumber = $telNumber;
    }

    protected $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    protected $adress;

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress): void
    {
        $this->adress = $adress;
    }

    protected $city;

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    protected $birthDate;

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function __construct($pathNameCsv,$pathCityCsv,$pathSurnameCsv,$name=null,$surname=null,$birthDate=null)
    {
        $this->pathNameCsv=$pathNameCsv;
        $this->pathCityCsv=$pathCityCsv;
        $this->pathSurnameCsv=$pathSurnameCsv;
        $this->name=$name;
        $this->surname=$surname;
        $this->birthDate=$birthDate;
    }
    public function generatePersonalData(GeneratePersonalData $personalDataObject){
        $personalData=$personalDataObject->generateData();
        return $personalData;
    }

    public function createPersons(){

        $personalData= $this->generatePersonalData(new GenerateName($this->pathNameCsv,$this->pathCityCsv,$this->pathSurnameCsv));
        $this->name=$personalData->name;
        $this->sex=$personalData->sex;
        $this->surname = $this->generatePersonalData(new GenerateSurname($this->pathNameCsv,$this->pathCityCsv,$this->pathSurnameCsv))->surname;
        $this->telNumber = $this->generatePersonalData(new GenerateTelNumber($this->pathNameCsv,$this->pathCityCsv,$this->pathSurnameCsv))->telNumber;
        $this->birthDate = $this->generatePersonalData(new GenerateBirthDate($this->pathNameCsv,$this->pathCityCsv,$this->pathSurnameCsv))->birthDate;
        $this->email = $this->generatePersonalData(new GenerateEmail($this->pathNameCsv,$this->pathCityCsv,$this->pathSurnameCsv,$this->name,$this->surname,$this->birthDate))->email;
        $this->city = $this->generatePersonalData(new GenerateCity($this->pathNameCsv,$this->pathCityCsv,$this->pathSurnameCsv))->city;
        return $this;
    }
}
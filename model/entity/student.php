<?php
class Student
{
    var $id;
    var $firstName;
    var $lastName;
    var $dateOfBirth; //DOB
    var $placeOfBirth; //POB
    function __construct($firstName, $lastName, $dateOfBirth, $placeOfBirth)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->placeOfBirth = $placeOfBirth;
    }
    function display()
    {
        echo "Họ tên: " . $this->firstName . " " . $this->lastName . "<br>";
        echo "Ngày sinh: " . $this->dateOfBirth . "<br>";
        echo "Nơi sinh: " . $this->placeOfBirth . "<br>";
    }
}

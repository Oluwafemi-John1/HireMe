<?php
// OOP, Classes
// Variables - properties|| functions - methods
// - Access modifiers - public, private, protected
    // Private variables can only be accessed within the class that created it
    // Protected variables can only be accessed within the class that created it and extends it, but cannot be accessed in a new instance
// - constructors and destructors
// - Class Inheritance
// - Polymorphism - when two or more methods are doing the same thing but are receiving different parameters




class Intro {
    public $name = "Oluwafemi";
    protected $school = "SQI";
    public $department = "Software Engineering";

    public function __construct($user) {
        echo 'Welcome to OOP, '.$user;
    }
    
    public function callName() {
        echo $this->name;
    }

    public function __destruct()
    {
        echo "We are done";
    }

    public function calculateTax($amount, $percentage) {
        echo $amount * $percentage;
    }

}

class Extro extends Intro {
    public $profile_picture = 'images/avatar.png';
    public $department = "UI/UX";

    public  function changeDept() {
        echo $this->department;
    }

    public  function changeSch() {
        echo $this->school;
    }
}

$newIntro = new Intro('Femi');
// echo $newIntro->callName();
// echo $newIntro->school;
$newExtro = new Extro('John');
// echo $newExtro->department;

$newIntro->calculateTax(45000, .5);
$newExtro->calculateTax(90000, .5);
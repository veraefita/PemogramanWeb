<?php
class animal{
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function eat(){
        echo $this->name . " Is eating.<br>";
    }

    public function sleep(){
        echo $this->name . " Is sleeping.<br>";
    }
}

class Cat extends Animal{

    public function meow(){
        echo $this->name . " Says meoww!!<br>";
    }
}

class Dog extends Animal{

    public function bark(){
        echo $this->name ." Says woof!<br>";
    }
}

$cat = new Cat("Whiskers");
$dog = new Dog ("Buddy");

$cat->eat();
$dog->sleep();

$cat->meow();
$dog->bark();


?>


i
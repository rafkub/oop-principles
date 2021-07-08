<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\Inheritance;

// a class which is inherited from is called base, super or parent class
class Person // might be defined abstract if its instantiation is forbidden
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function introduceYourself(): string
    {
        return "My name is $this->name.";
    }
}

// a class which inherits from another one is called a subclass, derived class or a child class
class Student extends Person // a student inherits person's features
{
    private int $grade;

    public function __construct(string $name, int $grade)
    {
        parent::__construct($name);
        $this->grade = $grade;
    }

    public function introduceYourself(): string
    {
        return parent::introduceYourself() . " I am in $this->grade grade."; // code reuse is possible
    }
}

class Teacher extends Person // a teacher also inherits person's features
{
    private string $subject;

    public function __construct(string $name, string $subject)
    {
        parent::__construct($name);
        $this->subject = $subject;
    }

    public function introduceYourself(): string
    {
        return parent::introduceYourself() . " I teach $this->subject.";
    }
}

// Usage is identical as in without-inheritance.php:
echo 'Student:' . PHP_EOL;
$student = new Student('Tom', 5);
echo $student->introduceYourself() . PHP_EOL;

echo 'Teacher:' . PHP_EOL;
$teacher = new Teacher('Eva', 'science');
echo $teacher->introduceYourself() . PHP_EOL;
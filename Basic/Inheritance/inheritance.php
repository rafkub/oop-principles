<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\Inheritance;

// a class which is inherited from is called base, super or parent class
class Person // might be defined abstract if its instantiation is forbidden
{
    public function __construct(private string $name) {}

    public function introduceYourself(): string
    {
        return "My name is $this->name.";
    }
}

// a class which inherits from another one is called a subclass, derived class or a child class
class Student extends Person // a student inherits person's features
{
    public function __construct(string $name, private int $grade)
    {
        parent::__construct(name: $name);
    }

    public function introduceYourself(): string
    {
        return parent::introduceYourself() . " I am in $this->grade grade."; // code reuse is possible
    }
}

class Teacher extends Person // a teacher also inherits person's features
{
    public function __construct(string $name, private string $subject)
    {
        parent::__construct(name: $name);
    }

    public function introduceYourself(): string
    {
        return parent::introduceYourself() . " I teach $this->subject.";
    }
}

// Usage is identical as in without-inheritance.php:
echo 'Student:' . PHP_EOL;
$student = new Student(name: 'Tom', grade: 5);
echo $student->introduceYourself() . PHP_EOL;

echo 'Teacher:' . PHP_EOL;
$teacher = new Teacher(name: 'Eva', subject: 'science');
echo $teacher->introduceYourself() . PHP_EOL;
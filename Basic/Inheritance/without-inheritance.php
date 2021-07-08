<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\WithoutInheritance;

class Student
{
    public function __construct(private string $name, private int $grade) {}

    public function introduceYourself(): string
    {
        return "My name is $this->name. I am in $this->grade grade.";
    }
}

class Teacher
{
    public function __construct(private string $name, private string $subject) {} // name property duplication

    public function introduceYourself(): string
    {
        return "My name is $this->name. I teach $this->subject." ; // partly code duplication
    }
}

echo 'Student:' . PHP_EOL;
$student = new Student(name: 'Tom', grade: 5);
echo $student->introduceYourself() . PHP_EOL;

echo 'Teacher:' . PHP_EOL;
$teacher = new Teacher(name: 'Eva', subject: 'science');
echo $teacher->introduceYourself() . PHP_EOL;
<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\WithoutInheritance;

class Student
{
    private string $name;
    private int $grade;

    public function __construct(string $name, int $grade)
    {
        $this->name = $name;
        $this->grade = $grade;
    }

    public function introduceYourself(): string
    {
        return "My name is $this->name. I am in $this->grade grade.";
    }
}

class Teacher
{
    private string $name; // code duplication
    private string $subject;

    public function __construct(string $name, string $subject)
    {
        $this->name = $name;
        $this->subject = $subject;
    }

    public function introduceYourself(): string
    {
        return "My name is $this->name. I teach $this->subject." ; // partly code duplication
    }
}

echo 'Student:' . PHP_EOL;
$student = new Student('Tom', 5);
echo $student->introduceYourself() . PHP_EOL;

echo 'Teacher:' . PHP_EOL;
$teacher = new Teacher('Eva', 'science');
echo $teacher->introduceYourself() . PHP_EOL;
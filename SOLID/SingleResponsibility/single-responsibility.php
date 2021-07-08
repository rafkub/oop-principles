<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\SingleResponsibility;

class Report // the class is responsible only for managing the content of a report
{
    public function __construct(private string $name) {}

    public function getName(): string
    {
        return $this->name;
    }
}

class Printer // a separate class is responsible for a report formatting
{
    public function toPdf(Report $report): string
    {
        return "Generating a {$report->getName()} report in PDF...";
    }
}

$report = new Report(name: 'Sales');
$printer = new Printer();
echo $printer->toPdf(report: $report) . PHP_EOL;
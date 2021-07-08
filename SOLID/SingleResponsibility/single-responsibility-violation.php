<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\SingleResponsibilityViolation;

// The class has two reasons to change:
// 1. the content of the report could change
// 2. the format of the report could change
class Report
{
    public function __construct(private string $name) {}

    public function toPdf(): string
    {
        return "Generating a $this->name report in PDF...";
    }
}

$report = new Report(name: 'Sales');
echo $report->toPdf() . PHP_EOL;
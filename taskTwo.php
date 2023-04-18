<?php
class Employee
{
    private string $name;
    private float $salary;

    public function __construct(string $name, float $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
}

class Office
{
    private string $name;
    private array $employees;

    public function __construct(string $name, array $employees)
    {
        $this->name = $name;
        $this->employees = $employees;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function getTotalSalary(): float
    {
        $total = 0;
        foreach ($this->employees as $employee) {
            $total += $employee->getSalary();
        }
        return $total;
    }
}

class Company
{
    private string $name;
    private array $offices;

    public function __construct(string $name, array $offices)
    {
        $this->name = $name;
        $this->offices = $offices;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOffices(): array
    {
        return $this->offices;
    }

    public function getSortedOfficesBySalary(): array
    {
        $sortedOffices = $this->offices;
        usort($sortedOffices, function ($office1, $office2) {
            return $office2->getTotalSalary() <=> $office1->getTotalSalary();
        });
        return $sortedOffices;
    }

    public function getFilteredOffices(): array
    {
        $filteredOffices = [];
        foreach ($this->offices as $office) {
            $numEmployees = count($office->getEmployees());
            if (($numEmployees > 5 && $numEmployees < 19) || ($numEmployees > 3 && $numEmployees < 23)) {
                $filteredOffices[] = $office;
            }
        }
        return $filteredOffices;
    }
}

// Створюємо компанію
$company = new Company('My Company', [
    new Office('Office 1', [
        new Employee('John Smith', 4000),
        new Employee('Jane Smith', 4500),
        new Employee('Bob Smith', 5000),
    ]),
    new Office('Office 2', [
        new Employee('Alice Johnson', 6000),
        new Employee('Jack Johnson', 5500),
        new Employee('Bob Johnson', 4800),
        new Employee('Jane Johnson', 4200),
    ]),
    new Office('Office 3', [
        new Employee('Tom Adams', 5500),
        new Employee('Alice Adams', 4700),
        new Employee('Bob Adams', 4300),
        new Employee('Jane Adams', 3900),
        new Employee('Jack Adams', 6500),
    ]),
    new Office('Office 4', [
        new Employee('Tom Jones', 5600),
        new Employee('Alice Jones', 5200),
        new Employee('Bob Jones', 4800),
        new Employee('Jane Jones', 4200),
    ]),
    new Office('Office 5', [
        new Employee('John Clarke', 7000),
        new Employee('Tom Clarke', 6500),
        new Employee('PeAliceter Clarke', 6000),
        new Employee('Bob Clarke', 5500),
        new Employee('Jane Clarke', 5000),
    ]),

]);

// Виведення списку офісів компанії, відсортованих за витратами на зарплати співробітників
$sortedOffices = $company->getSortedOfficesBySalary();
echo "Список офісів компанії, відсортованих за витратами на зарплати співробітників:\n";
foreach ($sortedOffices as $office) {
    echo $office->getName() . ' - ' . $office->getTotalSalary() . "\n";
}

// Виведення списку офісів компанії, у яких співробітників більше 5, але менше 19 або менше 23, але більше 3
$filteredOffices = $company->getFilteredOffices();
echo "\nСписок офісів компанії, у яких співробітників більше 5, але менше 19 або менше 23, але більше 3:\n";
foreach ($filteredOffices as $office) {
    echo $office->getName() . ' - ' . count($office->getEmployees()) . " employees\n";
}
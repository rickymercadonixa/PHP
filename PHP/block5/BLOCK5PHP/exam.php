<?php

class Employee {
    private $name;
    private $age;
    private $salary;

    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }

    // Getter methods
    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getSalary() {
        return $this->salary;
    }

    // Setter methods with validation
    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        if ($age >= 18) {  // Enforce minimum age rule
            $this->age = $age;
        } else {
            echo "Minimum age for employees is 18.";
        }
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }
}

// Example usage:
$emp1 = new Employee("John Doe", 25, 50000);
echo $emp1->getName() , "<br>";  // Output: John Doe

$emp1->setAge(17);  // Output: Minimum age for employees is 18.
$emp1->setAge(30);
echo $emp1->getAge() , "<br>";  // Output: 30

$emp1->setSalary(60000);
echo $emp1->getSalary();  // Output: 60000

?>

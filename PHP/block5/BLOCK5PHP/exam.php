<?php
    class employee{
        private $name;
        private $age;
        private $salary;

        public function __construct($name, $age, $salary){
            $this -> name = $name;
            $this -> age = $age;
            $this -> salary = $salary;
        }

        public function get_name(){
            return $this -> name;
        }

        public function get_age(){
            return $this -> age;
        }

        public function get_salary(){
            return $this -> salary;
        }

        public function setname($name){
            $this -> name = $name;
        }

        public function setage($age){
            if($age < 18){
                echo "The minimum age is 18. <br>";
            }
            else{
                $this -> age = $age;
            }
        }

        public function setsalary($salary){
            $this -> salary = $salary;
        }
    }

        $emp1 = new employee ("Ricky Mercado", 19, 25000);

        echo $emp1 -> get_name();
        echo "<br>";

        $emp1 -> setage(17);
        $emp1 -> setage(19);
        echo $emp1 -> get_age();
        echo "<br>";

        $emp1 -> setsalary(25000);
        echo $emp1 -> get_salary();
        
?>
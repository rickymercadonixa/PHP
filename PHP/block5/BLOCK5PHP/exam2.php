<?php
    class Shape{
        public $name;
        public $color;

        public function __construct($name, $color){
            $this -> name = $name;
            $this -> color = $color;
        }

        function get_name(){
            return $this -> name;
        }

        function get_color(){
            return $this -> color;
        }
    }

        class Circle extends Shape{
            public function __construct($raidus){
            parent:: __construct($name. $color);
            $this -> raidus = $raidus;
            }
        }

        
        

        class Rectangle extends Shape{
            public function __construct($lenght, $width){
                $this -> lenght -> $lenght;
                $this -> width -> $width;
            }
        }

        class Triangle extends Shape{
            public function __construct($base, $height){
                $this -> base = $base;
                $this -> height = $height;
            }
        }
    }

?>
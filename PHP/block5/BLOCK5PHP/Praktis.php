<?php
    class Suspect{
        public $name;
        public $motive;

        function __construct($name, $motive){
            $this -> name = $name;
            $this -> motive = $motive;
        }

        function set_name($name){
            $this -> name = $name;
        }

        function get_name(){
            return $this -> name;
        }

        function set_motive($motive){
            $this -> motive = $motive;
        }

        function get_motive(){
            return $this -> motive;
        }
    }

    $Doraemon = new Suspect("Evil Queen", "Jealousy and desire for power");

    echo $Doraemon -> get_name();
    echo "<br>";
    echo $Doraemon -> get_motive();
?>
<?php
    class Suspect{
        public $name;
        public $motive;

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

    $Doraemon = new Suspect();
    $Doraemon -> set_name("Evil Queen");
    $Doraemon -> set_motive("Desire to take over the kingdom");

    echo "Name: ".$Doraemon -> get_name();
    echo "<br>";
    echo "Motive: ".$Doraemon -> get_motive();
?>
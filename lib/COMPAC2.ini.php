<?php

class Compac2 {
    
    private $name;
    private $base;
    public $con;

    public function __sql(){
        $name = '*\\*';
        $base = array('Database' => '*');
        $con = sqlsrv_connect($name, $base);
        return $con;
    }
}
?>

<?php

class Compac2 {
    
    private $name;
    private $base;
    public $con;

    public function __sql(){
        $name = 'SENDBOXSERVER\\COMPAC2';
        $base = array('Database' => 'adCOMERCIALIZADORAIDE');
        $con = sqlsrv_connect($name, $base);
        return $con;
    }
}
?>
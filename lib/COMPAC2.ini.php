<?php

class Compac2 {
    
    private $name;
    private $base;
    private $con;

    function __construct(){
        $this->name = 'SENDBOXSERVER\\COMPAC2';
        $this->base = array('Database' => 'adCOMERCIALIZADORAIDE');
    }

    static private function __sql(){
        $con = sqlsrv_connect($this->name, $this->base);
        return $con;
    }

    public function __srv(){
        return $this->con;
    }
}

?>
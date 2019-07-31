<?php

class Counted {
    public function rows(){
        $name = 'SENDBOXSERVER\\COMPAC2';
        $base = array('Database' => 'adCOMERCIALIZADORAIDE');
        try {
            $con = sqlsrv_connect($name, $base);
            if($con){
                $query = sqlsrv_query($con, 'SELECT COUNT(CIDPRODUCTO) FROM dbo.admProductos', array(), array('Scrollable' => SQLSRV_CURSOR_KEYSET));
                $query = sqlsrv_fetch_array($query, SQLSRV_FETCH_NUMERIC);
                return $query[0];
            } else {
                throw new Exception('No se pudo conectar al modulo compac2');
            }
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
}
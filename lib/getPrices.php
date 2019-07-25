<?php

include 'COMPAC2.ini.php';

class Prices extends Compac2 {
    
    private $mayor;
    private $teniente;
    private $coronel;

    public function __mayor() {
        try {
            if(parent::__srv()){
                $sult = sqlsrv_query(parent::__srv(), 'SELECT CIDPRODUCTO, CPRECIO1', array(), array('Scrollable' => SQLSRV_CURSOR_KEYSET));
                var_dump($sult);
                $count_sult = sqlsrv_num_rows($sult);
            }else{
                throw new Exception('No se pudo conectar al modulo Compac2');
            }
            
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
}

$a = new Prices;
var_dump($a->__mayor());

?>
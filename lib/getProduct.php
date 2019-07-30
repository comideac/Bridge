<?php

class Product {
    
    private $mayor;
    private $teniente;
    private $coronel;

    /*
     * Require highest price registered on contpaqi product
     * It connect to contpaqi database (SQL SERVER or SQLEXPRESS)
     * */
    public function __mayor($mayor) {
        $name = 'SENDBOXSERVER\\COMPAC2';
        $base = array('Database' => 'adCOMERCIALIZADORAIDE');
        try {
            $con = sqlsrv_connect($name, $base);
            if($con){
                $query = sqlsrv_query($con, 'SELECT CPRECIO1 FROM dbo.admProductos WHERE (CIDPRODUCTO = '.$mayor.')', array(), array('Scrollable' => SQLSRV_CURSOR_FORWARD));
                $getPrices = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                return $getPrices;
            }else{
                sqlsrv_close($con);
                throw new Exception('No se pudo conectar al modulo Compac2');
            }
            sqlsrv_close($con);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    /*
     * Require middle price registered on contpaqi product
     * It connect to contpaqi database (SQL SERVER or SQLEXPRESS)
     * */
    public function __teniente($teniente){
        $name = 'SENDBOXSERVER\\COMPAC2';
        $base = array('Database' => 'adCOMERCIALIZADORAIDE');
        try {
            $con = sqlsrv_connect($name, $base);
            if($con){
                $query = sqlsrv_query($con, 'SELECT CPRECIO2 FROM dbo.admProductos WHERE (CIDPRODUCTO = '.$teniente.')', array(), array('Scrollable' => SQLSRV_CURSOR_FORWARD));
                $getPrices = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                return $getPrices;
            }else{
                sqlsrv_close($con);
                throw new Exception('No se pudo conectar al modulo Compac2');
            }
            sqlsrv_close($con);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    /*
     * Require lower price registered on contpaqi product
     * It connect to contpaqi database (SQL SERVER or SQLEXPRESS)
     * */
    public function __coronel($coronel){
        $name = 'SENDBOXSERVER\\COMPAC2';
        $base = array('Database' => 'adCOMERCIALIZADORAIDE');
        try {
            $con = sqlsrv_connect($name, $base);
            if($con){
                $query = sqlsrv_query($con, 'SELECT CPRECIO3 FROM dbo.admProductos WHERE (CIDPRODUCTO = '.$coronel.')', array(), array('Scrollable' => SQLSRV_CURSOR_FORWARD));
                $getPrices = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
                var_dump($getPrices);
            }else{
                sqlsrv_close($con);
                throw new Exception('No se pudo conectar al modulo Compac2');
            }
            sqlsrv_close($con);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function __referal($referal){
        $name = 'SENDBOXSERVER\\COMPAC2';
        $base = array('Database' => 'adCOMERCIALIZADORAIDE');
        try {
            $con = sqlsrv_connect($name, $base);
            if($con){
                $query = sqlsrv_query($con, 'SELECT CCODIGOPRODUCTO FROM dbo.admProductos', array(), array('Scrollable' => SQLSRV_CURSOR_KEYSET));
                $count_query = sqlsrv_num_rows($query);
                for($i=0; $i<$count_query+4; $i++){
                    $getReference = sqlsrv_query($con, 'SELECT * FROM dbo.admProductos WHERE CIDPRODUCTO = '.$i.'', array(), array('Scrollable' => SQLSRV_CURSOR_FORWARD));
                    $getReference = sqlsrv_fetch_array($getReference, SQLSRV_FETCH_ASSOC);
                    $getReference = $getReference['CCODIGOPRODUCTO'];
                }
            } else {
                throw new Exception('No se pudo conectar a SQL Server');
            }
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function __nombre($referal){
        $name = 'SENDBOXSERVER\\COMPAC2';
        $base = array('Database' => 'adCOMERCIALIZADORAIDE');
        try {
            $con = sqlsrv_connect($name, $base);
            if($con){
                $query = sqlsrv_query($con, 'SELECT ');
            }
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

}

$a = new Product();
$a->__referal('');

?>
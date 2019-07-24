<?php

#6d788d5163cedecfa97644f952a6af6b apik

header('Content-Type: application/json');

class getPrices {
    public function mubPrices(){
        $serverName = "SENDBOXSERVER\\COMPAC2"; // -> Nombre del SQL Server con Instancia
        $connectionInfo = array( "Database"=>"adCOMERCIALIZADORAIDE"); // -> Nombre de la base de datos
        $conn = sqlsrv_connect( $serverName, $connectionInfo); // -> Conexión con parametros anteriores
        if( $conn ) { // -> Retorna true si la conexión fue exitosa

            $query = sqlsrv_query($conn, 'SELECT * FROM dbo.admProductos', array(), array('Scrollable' => SQLSRV_CURSOR_KEYSET)); // -> Consulta a la base de datos y retorna la tabla especificada
            $count_query = sqlsrv_num_rows($query);  // -> Cuenta el número de filas de la tabla retornada
            #var_dump($query);
            for($i=0; $i < $count_query+4; $i++){
                $getProducts = sqlsrv_query($conn, 'SELECT * FROM dbo.admProductos WHERE CIDPRODUCTO = '.$i.'', array(), array('Scrollable' => SQLSRV_CURSOR_KEYSET));
                $getProducts = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC);
                if($getProducts['CNOMALTERN'] != null){
                    $referencia = array($i => $getProducts['CIDPRODUCTO'], $getProducts['CNOMALTERN'], $getProducts['CPRECIO1'], $getProducts['CPRECIO2'], $getProducts['CPRECIO3']);
                    var_dump($referencia);
                }

            }
            /*for($i=0;$i < $test1; $i++){ // -> Inicia un bucle del  0 al número total de filas retornadas en variable anterior
                $getReason = sqlsrv_query($conn, 'SELECT * FROM dbo.admProductos WHERE CIDPRODUCTO = '.$i.'', array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)); // -> Consulta la base de datos y retorna razon social
                $getReason = sqlsrv_fetch_array($getReason, SQLSRV_FETCH_ASSOC); // -> Enlista la respuesta de la consulta anterior
                $getMail = sqlsrv_query($conn, 'SELECT * FROM dbo.admDomicilios WHERE CIDCATALOGO = '.$i.''); // -> Consulta la base de datos y retorna los productos que coincidan con el conteo de la funcion parental
                $getMail = sqlsrv_fetch_array($getMail, SQLSRV_FETCH_ASSOC); // -> Enlista la respuesta de la consulta anterior
                $mailingList = utf8_encode($getMail['CEMAIL']); // -> Especifica la columna de la tabla y la guarda en una variable
            }*/
        }else{ // -> returna false si la conexion fue fallida
            echo "Connection could not be established.<br />"; // -> Imprime el mensaje ya que no se pudo conectar a la base de datos
            die( print_r( sqlsrv_errors(), true)); // -> especifica el error de la conexón fallida
        }
    }
}
$a = new getPrices;
$a::mubPrices();
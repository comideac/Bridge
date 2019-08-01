<?php

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

set_time_limit(1200);

header("Content-Type: text/html; charset=utf-8");
#header('Content-Type: application/json');

class getProduct {
    public function Id(){
        $serverName = 'SENDBOXSERVER\\COMPAC2';
        $serverInfo = array('Database' => 'adCOMERCIALIZADORAIDE');
        $conn = sqlsrv_connect($serverName, $serverInfo);

        $client = new SoapClient('https://ideac.com.mx/store/api/soap/?wsdl');
        $session = $client->login('P41N3ST', '78ae61b5c3af8b9630a74d37da1407a4');
        $sheet = IOFactory::load('../inventario.csv');
        $sheet = $sheet->getActiveSheet()->toArray(null, true, true, true);
        foreach($sheet as $qx){
            if(!empty($qx['B'])){
                if($qx['B'] != "--------------------------------"){
                    if($qx['B'] > 0){
                        $in_stock = 1;
                        $attributes = array(
                            'qty' => $qx['J'],
                            'is_in_stock' => $in_stock,
                            'manage_stock' => 1,
                            'use_config_manage_stock' => 0,
                            'min_qty' => 1,
                            'use_config_min_qty' => 0,
                            'min_sale_qty' => 1,
                            'use_config_min_sale_qty' => 0,
                            'max_sale_qty' => 10,
                            'use_config_max_sale_qty' => 0,
                            'is_qty_decimal' => 0,
                            'backorder' => 1,
                            'use_config_backorders' => 0,
                            'notify_stock_qty' => 0,
                            'use_config_notify_stock_qty' => 0
                        );
                        $sku = $client->call($session, 'catalog_product.list', $qx['B']);
                        var_dump($sku['SKU']);
                        #if(){
                            #$call = $client->call($session, 'cataloginventory_stock_item.update', array($qx['B'], $attributes));
                        #} else {
                            #
                        #}
                        var_dump($call);
                    } else {
                        #
                    }
                }
            }
        }
        
        #$query = sqlsrv_query($conn, "SELECT * FROM dbo.admProductos", array(), array('Scrollable' => SQLSRV_CURSOR_KEYSET));
        #while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        #    $x = json_encode($row['CCODIGOPRODUCTO']);
        #}
            
    }
}

$a = new getProduct;
$a->Id();

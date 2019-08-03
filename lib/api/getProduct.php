<?php

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

set_time_limit(4800);

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

        $product = $client->call($session, 'catalog_product.list');

        error_reporting(0);
        for($i=1;$i<count($product);$i++){
            for($l=1;$l<count($sheet);$l++){
                $productPage = $product[$i]['sku'];
                $idProuctPage = $product[$i]['product_id'];

                $productList = $sheet[$l]['B'];
                $stcokList = $sheet[$l]['J'];

                if($page == $list){
                    $update = $client->call($session, "product_stock.update", array(
                        $idProuctPage,
                        'qty' => $stockList,
                        'is_in_stock' => $stockList > 0 ? '1' : '0',
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
                    ));
                    var_dump($update);
                }
            }
        }

        /*for($i=1;$i<count($sheet);$i++){
            if(!empty($sheet[$i]['B'])){
                if($sheet[$i]['B'] != '--------------------------------'){
                    error_reporting(1);
                    if($product[$i]['sku'] == $sheet[$i]['B']){
                        $update = $client->call($session, "product_stock.update", array(
                            $product[$i]['product_id'],
                            'qty' => $sheet[$i]['J'],
                            'is_in_stock' => $sheet[$i]['J'] > 0 ? '1' : '0',
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
                        ));
                        print_r($update . " || " . $product[$i]['sku'] . " || " . $sheet[$i]['B'] . " || " . $sheet[$i]['J'] . "\n");
                    }
                }
            }
        }*/
        
        #$query = sqlsrv_query($conn, "SELECT * FROM dbo.admProductos", array(), array('Scrollable' => SQLSRV_CURSOR_KEYSET));
        #while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
        #    $x = json_encode($row['CCODIGOPRODUCTO']);
        #}
            
    }
}

$a = new getProduct;
$a->Id();

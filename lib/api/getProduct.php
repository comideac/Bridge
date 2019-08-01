<?php

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

set_time_limit(1200);

class getProduct {
    public function Id(){
        $client = new SoapClient('https://ideac.com.mx/store/api/soap/?wsdl');
        $session = $client->login('P41N3ST', '78ae61b5c3af8b9630a74d37da1407a4');
        $call = $client->call($session, 'catalog_product.list');
        foreach($call as $id){
            $id = $id['sku'];
            $updt = $client->call($session, 'cataloginventory_stock_item.update');
        }
    }

    public function Stock(){
        $sheet = IOFactory::load('../inventario.csv');
        $sheet = $sheet->getActiveSheet()->toArray(null, true, true, true);
        for($i=1;$i<count($sheet)+1;$i++){
            $list = array($sheet[$i]['B']);
            if(!empty($list[0])){
                if($list[0]!="--------------------------------"){
                    return $list[0];
                }
            }
        }
    }
}

$a = new getProduct;
$a->Stock();

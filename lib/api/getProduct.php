<?php

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

set_time_limit(1200);

class getProduct {
<<<<<<< HEAD
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
=======
    public function Info(){
        $client = new SoapClient('https://**.com/store/api/soap/?wsdl');
        $session = $client->login('**', '**');
        $countedRows = new Counted;
        for($i=1104; $i<$countedRows->rows()+1104; $i++){
            $call = $client->call($session, 'catalog_product.info', '1105');
            #if($call) {
            #
            #}
>>>>>>> f0bae56fe545816efc8909726ab22f4dd6289c1f
        }
    }
}

$a = new getProduct;
<<<<<<< HEAD
$a->Stock();
=======
$a->Info();
>>>>>>> f0bae56fe545816efc8909726ab22f4dd6289c1f

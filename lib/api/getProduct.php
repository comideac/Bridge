<?php

include '../dumpRows.php';

set_time_limit(1200);

class getProduct {
    public function Info(){
        $client = new SoapClient('https://**.com/store/api/soap/?wsdl');
        $session = $client->login('**', '**');
        $countedRows = new Counted;
        for($i=1104; $i<$countedRows->rows()+1104; $i++){
            $call = $client->call($session, 'catalog_product.info', '1105');
            #if($call) {
            #
            #}
        }
    }
}

$a = new getProduct;
$a->Info();

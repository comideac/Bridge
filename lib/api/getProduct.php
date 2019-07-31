<?php

include '../dumpRows.php';

set_time_limit(1200);

class getProduct {
    public function Info(){
        $client = new SoapClient('https://ideac.com.mx/store/api/soap/?wsdl');
        $session = $client->login('P41N3ST', '78ae61b5c3af8b9630a74d37da1407a4');
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
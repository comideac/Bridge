<?php

include '../dumpRows.php';

set_time_limit(1200);

class getProduct {
    public function Info(){
        $client = new SoapClient('https://ideac.com.mx/store/api/soap/?wsdl');
        $session = $client->login('P41N3ST', '78ae61b5c3af8b9630a74d37da1407a4');
        $countedRows = new Counted;
        $call = $client->call($session, 'catalog_product.info', 'SCMG5100', 'SKU');
        var_dump($call);
    }
}

$a = new getProduct;
$a->Info();
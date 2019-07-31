<?php

// 78ae61b5c3af8b9630a74d37da1407a4 K
// 227b2f0546451befef000e69676d3917 S

$client = new SoapClient('http://ideac.com.mx/store/api/soap/?wsdl');

// If somestuff requires API authentication,
// then get a session token
$session = $client->login('P41N3ST', '78ae61b5c3af8b9630a74d37da1407a4');

$result = $client->call($session, 'catalog_product.info', '1311');
var_dump($result);

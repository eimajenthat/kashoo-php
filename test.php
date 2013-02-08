<?php

require 'Kashoo.php';
define('DEBUG', true);

$config = require('config.php');

$kashoo = new Kashoo();
$kashoo->createApiToken($config['user'],$config['pass']);

$my_businesses = $kashoo->listBusinesses();
$kashoo->businessId = $my_businesses[0]['id'];
//echo 'BizId: '.$kashoo->businessId;

$invoiceJson = '  {
    "currency" : "USD",
    "dueDate" : "2013-01-21",
    "lineItems" : [
      {
        "account" : 9997419979,
        "quantity" : 1,
        "rate" : 1,
        "taxCode" : ""
      }
    ],
    "type" : "invoice",
    "date" : "2013-01-21",
    "poNumber" : ""
  }';
$invoiceJson = sprintf($invoiceJson, $kashoo->businessId);
//die($invoiceJson);

$kashoo->createInvoice($invoiceJson);
//$kashoo->listInvoices();
//$kashoo->listRecords();

echo "\n";
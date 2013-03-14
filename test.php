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
    "dueDate" : "%s",
    "lineItems" : [
      {
        "account" : 9997419979,
        "quantity" : 1,
        "rate" : 1,
        "taxCode" : ""
      }
    ],
    "type" : "invoice",
    "date" : "%s",
    "poNumber" : ""
  }';
$invoiceJson = sprintf(
  $invoiceJson, 
  date('Y-m-d'),
  date('Y-m-d')
);

// $kashoo->createInvoice($invoiceJson);

$kashoo->listContacts();
$kashoo->listCustomers();
$kashoo->listVendors();



$kashoo->listRecords();
$kashoo->listInvoices();

$kashoo->listBills();
$billJson = '  {
    "currency" : "USD",
    "dueDate" : "%s",
    "lineItems" : [
      {
        "account" : 9997419972,
        "quantity" : 1,
        "rate" : 1,
        "taxCode" : ""
      }
    ],
    "type" : "bill",
    "date" : "%s",
    "poNumber" : ""
  }';
$billJson = sprintf(
  $billJson, 
  date('Y-m-d'),
  date('Y-m-d')
);
// $kashoo->createBill($billJson);

$rand = rand();
$accountJson = sprintf('{
    "name":"random account name %s",
    "number":%s,
    "type":"CASH"
  }',
  $rand,
  $rand
);
// $kashoo->createAccount($accountJson);
$kashoo->listAccounts();

echo "\n";
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
        "account" : %s,
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
  '9997419979',         // ID for the account to pay to, I think, you'll need to use your own
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
        "account" : %s,
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
  '9997419979',         // ID for the account to pay to, I think, you'll need to use your own 
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

$billPaymentJson = '{
      "type":"billPayment",
      "account":%s,
      "allocations":[
         {
            "amount":1,
            "record":%s
         }
      ],
      "amount":1,
      "contact":%s,
      "currency":"USD",
      "date":"%s",
      "unallocatedAmount":0
   }';
// Fill in your details, the ones below are for my test account 99.9% guaranteed NOT to work you
$billPaymentJson = sprintf(
  $billPaymentJson,
  '9997419964',         //Account... I guess the account to pay from?
  '11568679628',        //This is the ID of the Bill you're paying
  '10033389321',        //Payment allocations must go to a record with the same contact
  date('Y-m-d')
);

// $kashoo->createBillPayment($billPaymentJson);

$kashoo->listBillPayments();

echo "\n";


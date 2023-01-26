<?php
/*
use App\Controller\{TransactionController};

$transaction = new TransactionController(25, "Description");
$reflectionProperty = new ReflectionProperty(TransactionController::class, 'amount');
$reflectionProperty2 = new ReflectionProperty(TransactionController::class, 'description');

$reflectionProperty->setAccessible(true);
$reflectionProperty2->setAccessible(true);

$reflectionProperty->setValue($transaction, 120);
$reflectionProperty2->setValue($transaction, "Description change");

var_dump($reflectionProperty->getValue($transaction));
var_dump($reflectionProperty2->getValue($transaction));
*/
//phpinfo();
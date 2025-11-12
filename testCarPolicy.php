<?php
date_default_timezone_set('Europe/Dublin');
require_once('CarPolicy.php');

$initialPremium = 600;


$myCarPolicy = new CarPolicy("XM123456", "John Doe", "2015-10-10");


$yearsNoClaims = $myCarPolicy->getTotalYearsNoClaims();
$policyString  = $myCarPolicy->__toString();



echo "Policy Number: $policyString\n";
echo "Policy Holder: " . $myCarPolicy->getPolicyHolderName() . "\n";
echo "Years Without Claim: $yearsNoClaims years\n";
echo "Initial Premium: €" . number_format($initialPremium, 2) . "\n";
?>

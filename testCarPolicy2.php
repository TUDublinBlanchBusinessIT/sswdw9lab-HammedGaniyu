<?php
date_default_timezone_set('Europe/Dublin');
require_once('CarPolicy2.php');

$initialPremium = 600;


$myCarPolicy = new CarPolicy("XM123456", "John Doe", "2015-10-10", $initialPremium);



echo "Policy Number: " . $myCarPolicy . "\n";
echo "Policy Holder: " . $myCarPolicy->getPolicyHolderName() . "\n";
echo "Years Without Claim: " . $myCarPolicy->getTotalYearsNoClaims() . " years\n";
echo "Initial Premium: €" . number_format($initialPremium, 2) . "\n";
echo "Discount: " . ($myCarPolicy->getDiscount() * 100) . "%\n";
echo "Discounted Premium: €" . number_format($myCarPolicy->getDiscountedPremium(), 2) . "\n";
?>

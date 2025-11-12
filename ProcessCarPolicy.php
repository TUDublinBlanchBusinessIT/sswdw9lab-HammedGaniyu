<?php
// Set timezone
date_default_timezone_set('Europe/Dublin');


require_once("CarPolicy2.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $policyNumber      = $_POST['policyNumber'] ?? '';
    $policyHolderName  = $_POST['policyHolderName'] ?? '';
    $dateOfLastClaim   = $_POST['dateOfLastClaim'] ?? '';
    $initialPremium    = floatval($_POST['initialPremium'] ?? 0);

    
    if (!$policyNumber || !$policyHolderName || !$dateOfLastClaim || $initialPremium <= 0) {
        echo "Please fill in all fields correctly.";
        exit;
    }

    
    $myCarPolicy = new CarPolicy($policyNumber, $policyHolderName, $dateOfLastClaim, $initialPremium);

    
    $discountedPremium = $myCarPolicy->getDiscountedPremium();

    
    echo "<h2>Car Policy Result</h2>";
    echo "<p><strong>Policy Number:</strong> " . $myCarPolicy . "</p>";
    echo "<p><strong>Policy Holder:</strong> " . $myCarPolicy->getPolicyHolderName() . "</p>";
    echo "<p><strong>Initial Premium:</strong> €" . number_format($initialPremium, 2) . "</p>";
    echo "<p><strong>Discount:</strong> " . ($myCarPolicy->getDiscount() * 100) . "%</p>";
    echo "<p><strong>Discounted Premium:</strong> €" . number_format($discountedPremium, 2) . "</p>";


}
?>

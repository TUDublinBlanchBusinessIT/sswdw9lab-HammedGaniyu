<?php
class CarPolicy
{
   
    private $policyNumber;
    private $policyHolderName;
    private $dateOfLastClaim;
    private $yearlyPremium;

    
    public function __construct($policyNumber, $policyHolderName, $dateOfLastClaim, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->policyHolderName = $policyHolderName;
        $this->dateOfLastClaim = $dateOfLastClaim;
        $this->yearlyPremium = $yearlyPremium;
    }

    public function getPolicyNumber()
    {
        return $this->policyNumber;
    }

    public function getPolicyHolderName()
    {
        return $this->policyHolderName;
    }

    public function getDateOfLastClaim()
    {
        return $this->dateOfLastClaim;
    }

    public function getYearlyPremium()
    {
        return $this->yearlyPremium;
    }

    
    public function __toString()
    {
        return "PN: " . $this->policyNumber;
    }

    
    public function getTotalYearsNoClaims()
    {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return (int)$interval->format("%y");
    }

    
    public function getDiscount()
    {
        $yearsNoClaims = $this->getTotalYearsNoClaims();

        if ($yearsNoClaims >= 3 && $yearsNoClaims <= 5) {
            return 0.10; 
        } elseif ($yearsNoClaims > 5) {
            return 0.15; 
        } else {
            return 0.0; 
        }
    }

    
    public function getDiscountedPremium()
    {
        $discount = $this->getDiscount();
        return $this->yearlyPremium * (1 - $discount);
    }
}
?>

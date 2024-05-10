<?php
class MortgageEntity
{
    public function calculateMortgage($data)
    {
        $interest_rate = $data['interest_rate'];
        $loan_tenure = $data['loan_tenure'];
        $loan_amount = $data['loan_amount'];
        $property_price = $data['property_price'];

        $monthly_interest_rate = ($interest_rate / 100) / 12;
        $loan_tenure_months = $loan_tenure * 12;

        $monthly_payment = ($loan_amount * $monthly_interest_rate * pow(1 + $monthly_interest_rate, $loan_tenure_months)) / (pow(1 + $monthly_interest_rate, $loan_tenure_months) - 1);
        $down_payment = $property_price - $loan_amount;

        return array('monthly_payment' => $monthly_payment, 'down_payment' => $down_payment);
    }
}

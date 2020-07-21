<?php namespace App\Http\Controllers\Formatters;

class PhoneNumberFormatter 
{

    /**
     * Get phone number key and return a value
     * 
     * 
     * @param mixed $number
     * 
     * @return String
     */
    public function formatPhone($phoneNumber)
    {
        if ( is_null( $phoneNumber ) ) {
            return '---';
        }
        if ( strstr($phoneNumber, '-') ) {
            $phoneNumber = str_replace('-', '', $phoneNumber);
        }
        return '+' . $phoneNumber;
    }

}
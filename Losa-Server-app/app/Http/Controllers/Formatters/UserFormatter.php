<?php namespace App\Http\Controllers\Formatters;

class UserFormatter 
{

    /**
     * It returns the firstname of a full name string
     * 
     * @param string $fullname
     * 
     * @return string
     */
    public function getFirstname(string $fullname)
    {
        return explode(' ', $fullname)[0];
    }

}
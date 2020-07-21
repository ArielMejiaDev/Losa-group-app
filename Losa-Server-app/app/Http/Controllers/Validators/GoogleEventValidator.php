<?php namespace App\Http\Controllers\Validators;

class GoogleEventValidator 
{

    /**
     * Get a custom error from error type
     *
     * @param string $errorType
     * @return string
     */
    public function throwError($errorType)
    {
        $errors = [

            'noDateTime' => 'Todo el dia',

        ];

        return $errors[$errorType];

    }

}
<?php  namespace App;

trait SqlServerGetDateFormat
{

    /**
     * Get the format for database stored dates. Added by ArielSalvadorDev MrPHP
     *
     * @return string
     */
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
    
}

?>
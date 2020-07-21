<?php namespace App\Http\Controllers\Validators;

use Illuminate\Support\Facades\DB;

class GnewsItemValidator
{
    /**
     * Validate db is not empty
     * 
     * @return boolean
     */
    public function validateNewsItemTableIsNotEmpty()
    {
        return DB::table('new_items')->where('id', '>', 0)->get()->count() > 0;
    }

    /**
     * Evaluate difference in days from last news item stored in db
     * 
     * @return int
     */
    public function validateNewsItemIsNotFromToday($from)
    {
        return now()->diffInDays($from) > 0;
    }
}
<?php namespace App\Http\Controllers\Formatters;

use Carbon\Carbon;

class GnewsFormatter 
{
    /**
     * It creates a custom news item to consume for Mobile app
     * 
     * @return collection
     */
    public function setNewsForEndPoint($news)
    {
        $customNews = collect();
        foreach ($news as $new) {
            $customNews->push([
                'title' => $new->title, 
                'day' => explode('-', $new->published_at)[2], 
                'month' => str_replace('.', '',ucwords(Carbon::createFromFormat('Y-m-d', $new->published_at)->isoFormat('MMM')))
            ]);
        }
        return $customNews;
    }
}
<?php namespace App\Http\Controllers\Repositories;

use App\NewItem;
use App\Http\Controllers\Validators\GnewsItemValidator;
use App\Http\Controllers\Formatters\GnewsFormatter;

class GnewsRepository 
{
    /**
     * It get fresh news from api or stored news in db from today
     * 
     * @return \Illuminate\Support\Collection;
     */
    public function getNews(string $topic, int $quantity)
    {
        $gNewsFormatter = new GnewsFormatter;
        $gNewsValidator = new GnewsItemValidator;
        if ($gNewsValidator->validateNewsItemTableIsNotEmpty()) {
            $firstNew = NewItem::first();
            if ($gNewsValidator->validateNewsItemIsNotFromToday($firstNew->published_at)) {
                $updatedNews = $this->ReplaceMultipleNews($topic, $quantity);
                return $gNewsFormatter->setNewsForEndPoint($updatedNews);
            }
            $newsFromDb = NewItem::all();
            return $gNewsFormatter->setNewsForEndPoint($newsFromDb);
        }
        $createdNews = $this->createMultipleNews($topic, $quantity);
        return $gNewsFormatter->setNewsForEndPoint($createdNews);
    }

    /**
     * Get some number of news of some topic
     * 
     * @param string $topic
     * @param int $numberOfNews
     * 
     * @return array
     */
    public function fetchNews(string $topic, int $numberOfNews)
    {
        $token = env('GNEWS_TOKEN');
        $url = "https://gnews.io/api/v3/topics/{$topic}?token={$token}&lang=es&max=$numberOfNews";
        $data = file_get_contents($url);
        $new = json_decode($data);
        return $new->articles;
    }

    /**
     * Stores a news json in database
     * 
     * @param stdClass $new
     * 
     * @return \App\NewItem
     */
    public function fromJsonToNewsItemModel($newsItemAsJson, $newsItemObject = null)
    {
        $newItem = new NewItem;
        if ($newsItemObject) {
            $newItem = $newsItemObject;
        }
        $newItem->title = $newsItemAsJson->title;
        $newItem->published_at = $newsItemAsJson->publishedAt;
        return $newItem;
    }

    /**
     * Replace news from db
     * 
     * @return array
     */
    public function replaceMultipleNews($topic, $quantity)
    {
        NewItem::truncate();
        return $this->createMultipleNews($topic, $quantity);
    }

    /**
     * Create or Update news from db
     * 
     * @return array
     */
    public function createMultipleNews(string $topic, int $quantity)
    {
        $news = $this->fetchNews($topic, $quantity); 
        foreach ($news as $new) {
            $newItem = $this->fromJsonToNewsItemModel($new);
            $newItem->save();
        }
        return NewItem::all();
    }

}
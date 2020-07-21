<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Repositories\GnewsRepository;

class NewsControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Tests a request to get news
     * 
     * @return void
     */
    public function testNewsControllerApiEndpointAvailability()
    {
        $user = $this->createUser();
        $this->be($user);
        $topic = 'business';
        $this->get("/api/v1/news/$topic")->assertStatus(200);
    }

    /**
     * Tests NewsController can fetch data from GnewsApi
     * 
     * @return void 
     */
    public function testNewsControllerFetchDataFromGnewsApi()
    {
        $gnewsRepository = new GnewsRepository;
        $result = $gnewsRepository->getNews('business', 5);
        $this->assertTrue(!empty($result));
    }


    /**
     * Tests if NewsController can replace news every day
     * 
     * @return void
     */
    public function testNewsControllerReplaceNewsEveryDay()
    {
        $gNewsRepository = new GnewsRepository;
        $newItem = $this->createNewItem();
        $diff = now()->diffInDays($newItem->published_at);
        if ($diff > 1) {
            $news = $gNewsRepository->getNews('business', 5);
            $this->assertTrue($newItem->title !== $news[0]['title']);
        }
    }

}

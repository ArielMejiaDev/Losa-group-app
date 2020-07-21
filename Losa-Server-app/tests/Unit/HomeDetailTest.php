<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Http\Controllers\Formatters\UserFormatter;
use App\Http\Controllers\Repositories\GnewsRepository;
use App\Http\Controllers\Formatters\GnewsFormatter;

class HomeDetailTest extends TestCase
{
    /**
     * Tests end point availability
     * 
     * @return void
     */
    public function testHomeDetailsEndpointAvailability()
    {
        $user = $this->createUser();
        $this->get("/api/v1/home-details/$user->id", $this->headers)->assertStatus(200);
    }

    /**
     * Tests endpoint get an Id and return user name and the lastest 5 news
     * 
     * @return void
     */
    public function testHomeDetailRetriveAllRequiredDataForHomeScreen()
    {
        $user = User::first();
        $newsRepository = new GnewsRepository;
        $news = $newsRepository->getNews('business', 5);
        $userFormatter = new UserFormatter;
        $userFirstname = $userFormatter->getFirstnameFromFullnameString($user->name);
        $this->get("/api/v1/home-details/$user->id", $this->headers)->assertStatus(200)->assertJsonFragment([
            'name' => $userFirstname,
            'title' => $news[0]['title']
        ]);
    }

}

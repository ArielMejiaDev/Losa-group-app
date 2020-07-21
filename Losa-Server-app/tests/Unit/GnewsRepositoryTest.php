<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Repositories\GnewsRepository;

class GnewsRepositoryTest extends TestCase
{
    /**
     * It tests a json request for Gnews
     * 
     * @return array
     */
    public function testGnewsRepository()
    {
        $gNewsRepository = new GnewsRepository;
        $new = $gNewsRepository->getNews('business', 5);
        $this->assertTrue(!empty($new));
    }
}

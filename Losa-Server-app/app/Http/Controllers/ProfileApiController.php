<?php namespace App\Http\Controllers;

use App\Http\Controllers\Formatters\UserFormatter;
use App\Http\Controllers\Repositories\GnewsRepository;
use App\User;

class ProfileApiController extends Controller
{
    protected $formatter;
    protected $gNewsRepository;

    public function __construct(GnewsRepository $gNewsRepository, UserFormatter $formatter)
    {
        $this->formatter = $formatter;
        $this->gNewsRepository = $gNewsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //$news = $this->gNewsRepository->getNews('business', 5);
        $name = $this->formatter->getFirstName( $user->name );
        return response()->json([
            'name' => $name,
        ]);
    }

    /**
     * Display the specified resource for API
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

}

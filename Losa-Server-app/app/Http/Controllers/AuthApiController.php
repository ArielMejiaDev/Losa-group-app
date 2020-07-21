<?php namespace App\Http\Controllers;

use App\Http\Controllers\Validators\AuthApiValidator;
use App\Http\Requests\LoginApiRequest;

class AuthApiController extends Controller
{
    protected $credentialsValidator;

    public function __construct(AuthApiValidator $credentialsValidator)
    {
        $this->credentialsValidator = $credentialsValidator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LoginApiRequest $request)
    {
        return $this->credentialsValidator->validates($request->email, $request->password);
    }

}

<?php namespace App\Http\Controllers\Validators;

use Illuminate\Support\Facades\Hash;
use App\User;

class AuthApiValidator
{
    
    public function validates(string $email, string $password)
    {
        $user = User::where(['email' => $email])->first();
        if (is_null($user)) return $this->showCredentialsError();
        return $this->comparePasswords($password, $user);
    }

    public function comparePasswords(String $password, User $user)
    {
        if (Hash::check($password, $user->getAuthPassword())) {
            return response()->json([
                'authenticated' => true,
                'data' => [
                    'id' => $user->id,
                ]
            ]);
        }
        return $this->showCredentialsError();
    }

    public function showCredentialsError()
    {
        return response()->json([
            'authenticated' => false,
            'errors' => [
                'password' => 'Credenciales invalidas'
            ]
        ], 404);
    }
    
}

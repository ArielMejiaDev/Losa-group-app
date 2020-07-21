<?php namespace App\Http\Controllers\Searchable;

class Searchable 
{

    public static function query()
    {
        $request = request()->validate(['query' => 'required|min:2'], [], ['query' => 'Busqueda']);
        return $request['query'];
    }

}
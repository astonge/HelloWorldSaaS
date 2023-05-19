<?php

namespace App\Services\HelloWorld;

use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Access\Response;

class HelloWorldService
{
    private const API_URL = 'http://127.0.0.1:8080';

    public function __construct()
    {
        // 
    }
    
    public function hello(): string
    {
        $response = Http::get(self::API_URL. '/hello');
        return $response->ok() 
            ? $response 
            : Response::deny('Error retriving data');
    }

    public function world(): string
    {
        $response = Http::get(self::API_URL. '/world');
        return $response->ok() 
            ? $response 
            : Response::deny('Error retriving data');
    }
}
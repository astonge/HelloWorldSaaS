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
        try {
            $response = Http::connectTimeout(3)->get(self::API_URL. '/hello');
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Log error
            $response = Response::deny('Error retriving data');
        }

        return $response;
    }

    public function world(): string
    {
        try {
            $response = Http::connectTimeout(3)->get(self::API_URL. '/world');
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Log error
            $response = Response::deny('Error retriving data');
        }

        return $response;
    }
}
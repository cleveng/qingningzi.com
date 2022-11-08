<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/laravel-hashids
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [
        'main' => [
            'salt' => env('APP_KEY'),
            'length' => '11',
            'alphabet' => 'GheAgQCH1ybBkp4WadledcysiUYnRcjFYvJkrpOoRXbzLg6tDBsTIF2d4CuZdUgz'
        ],

        'category' => [
            'salt' => env('APP_KEY'),
            'length' => '11',
            'alphabet' => 'mydsUWFnw7QrVs6HD5At3mkQ3CDH95vyDPgluHs3qawJX5vtHzXFGqIdzUCNm0xT'
        ],

        'article' => [
            'salt' => env('APP_KEY'),
            'length' => '11',
            'alphabet' => 'NtrlR6I6mEkGztyqS4QkpejJ8nslu3NRbRjFjWVGgq49XH6rBGOkhG8Uj8JWLgzF'
        ],

        'post' => [
            'salt' => env('APP_KEY'),
            'length' => '11',
            'alphabet' => 'g9PHkr7ZoxQXOx5lkU5STGVnLJRJ9KbDVwi6qCNp0n78wNxm6163k2ePHZxLZzDw'
        ],

        'recommend' => [
            'salt' => env('APP_KEY'),
            'length' => '6',
        ],
    ],

];

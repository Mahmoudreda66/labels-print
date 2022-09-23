<?php

namespace App;

use Dotenv\Dotenv;
use Mahmoud\Labels\Request;
use Mahmoud\Labels\Response;
use Mahmoud\Labels\Route;

class App
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->safeLoad();

        session_start();

        Route::resolve(new Request, new Response);
    }
}

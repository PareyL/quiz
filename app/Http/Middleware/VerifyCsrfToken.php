<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Encryption\Encrypter;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Application;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}

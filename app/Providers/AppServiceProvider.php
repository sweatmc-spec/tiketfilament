<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Auth\Http\Responses\LoginResponse as ResponsesLoginResponse;
use Filament\Auth\Http\Responses\LogoutResponse as ResponsesLogoutResponse;
use App\Http\Responses\LoginResponse;
use App\Http\Responses\LogoutResponse;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        ResponsesLoginResponse::class => LoginResponse::class,
        ResponsesLogoutResponse::class => LogoutResponse::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}

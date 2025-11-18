<?php

namespace App\Http\Responses;

use Filament\Auth\Http\Responses\LogoutResponse as ResponsesLogoutResponse;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LogoutResponse extends ResponsesLogoutResponse
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        // After logout, send to central login route or homepage
        return redirect()->route('login');
    }
}

<?php

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

// ============ GOOGLE OAUTH =================== //
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google-redirect');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        ['name' => $googleUser->getName()]
    );

    Auth::login($user);

    return redirect('/dashboard');
})->name('auth.google-callback');


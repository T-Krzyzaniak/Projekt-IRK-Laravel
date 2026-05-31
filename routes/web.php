<?php

use App\Http\Controllers\PracownikController;
use App\Http\Controllers\UzytkownikController;
use App\Http\Controllers\patientsController;
use App\Livewire\patientsForm;
use App\Livewire\CandidateForm;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('pracowniks', PracownikController::class);
});
Route::get('/uzytkownicy', [UzytkownikController::class,'index'])->name('uzytkownicy.index');
Route::post('/uzytkownicy/{user}/role', [UzytkownikController::class, 'updateRole'])->name('uzytkownicy.update-role');

Route::get('/patients/create', [patientsController::class, 'create'])->name('patients.create');

Route::get('/patients', function () {
    return view('patients.index');
})->name('patients.index');

Route::get('/candidate', function () {
    return view('candidate.index');
})->name('candidate.index');

Route::get('/candidate/{candidate}/edit', CandidateForm::class)->name('candidate.edit');

Route::get('/patients/{patients}/edit', patientsForm::class)->name('patients.edit');




Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

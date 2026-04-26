<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsAppController;

Route::get('/', function () {
    return view('portfolio');
});

Route::post('/webhook/whatsapp', [WhatsAppController::class, 'handle'])->name('whatsapp.webhook');

<?php

use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Template\Template;
use App\Http\Controllers\QueueController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TemplateController::class, 'index']);
Route::get('/get-queue-data', [QueueController::class, 'getQueueData'])->name('getQueueData');

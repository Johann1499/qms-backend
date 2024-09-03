<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\CashierController;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

Route::post('/queues', [QueueController::class, 'store']);
Route::get('/queues/generate-queue-number', [QueueController::class, 'generateQueueNumberForRequest']);
Route::get('/queues', [QueueController::class, 'index']);
Route::get('/queues/count-by-department', [QueueController::class, 'getQueueCountByDepartment']);
Route::delete('/queues/{id}', [QueueController::class, 'destroy']);

Route::get('/cashiers', [CashierController::class, 'index']);
Route::get('cashiers/inactive', [CashierController::class, 'getInactiveCashiers']);
Route::get('cashiers/total-by-department-status', [CashierController::class, 'getCashierCountByDepartment']);
Route::get('cashiers/{id}/status', [CashierController::class, 'getStatus']);
Route::put('/cashiers/{id}/status', [CashierController::class, 'updateStatus']);
Route::post('/cashiers', [CashierController::class, 'store']);
Route::put('/cashiers/{id}', [CashierController::class, 'update']);
Route::delete('/cashiers/{id}', [CashierController::class, 'destroy']);

Route::post('/admin/login', function (Request $request) {
    $request->validate([
        'username' => 'required|string',    
        'password' => 'required|string',
    ]);

    $admin = Admin::where('username', $request->username)->first();

    if ($admin && Hash::check($request->password, $admin->password)) {
        // Return success response, you can also return a token or session data here
        return response()->json(['status' => 'success', 'message' => 'Login successful'], 200);
    }

    return response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 401);
});

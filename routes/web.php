<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;


Route::get('/', function () {
    return view('Home');
});

Route::get('/Details', function () {
    return view('Details');
});


Route::post('/fill',[InventoryController::class,'indexadd']);

Route::get('/', [InventoryController::class, 'show1']);

Route::put('/items/{id}', [InventoryController::class, 'update']);

Route::delete('/del/{id}', [InventoryController::class, 'delete']);

Route::get('/shows/{id}', [InventoryController::class, 'show']);
<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/status', [ApiController::class, 'status']);
Route::get('/listar', [ApiController::class, 'listar']);
// Route::get('/buscacliente/{id}', [ApiController::class, 'buscaCliente']);

Route::post('/buscacadastro', [ApiController::class, 'buscaCadastroPost']);
Route::post('/addcadastro', [ApiController::class, 'addCadastro']);

Route::put('/updcadastro', [ApiController::class, 'updCadastro']);

Route::delete('/delcadastro/{id}', [ApiController::class, 'delCadastro']);

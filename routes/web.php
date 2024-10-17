<?php
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\testPDF;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//para probar el pdf
Route::get('/reporte/{id}', [testPDF::class, 'generarPDF']);

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees/print-preview', function () {
    $employees = \App\Models\Employees::with(['jabatan', 'eselon', 'units', 'ranks', 'work_locations'])->get();
    return view('pdf.employees-print', ['employees' => $employees]);
})->name('employees.print-preview');
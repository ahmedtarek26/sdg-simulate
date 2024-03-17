<?php

use App\Http\Controllers\GoalOneController;
use Illuminate\Support\Facades\Route;

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
// Route for data page
Route::get('/sdg-data',function(){
    return view('data');
});

// Route for site page
Route::get('/', function () {
    return view('welcome');
});


// routes for goal 1 pages
// First Route has function to visualize objects for data and meta data
Route::get('/goal1',[GoalOneController::class, 'index'])->name('goal1.index');

Route::get('/goal1/create', [GoalOneController::class, 'create'])->name('goal1.create');

Route::post('/goal1', [GoalOneController::class, 'store'])->name('goal1.store');

Route::get('/goal1/{id}', [GoalOneController::class, 'show'])->name('goal1.show');

Route::get('/goal1/{id}/edit', [GoalOneController::class, 'edit'])->name('goal1.edit');

Route::put('/goal1/{id}', [GoalOneController::class, 'update'])->name('goal1.update');

Route::delete('/goal1/{id}',[GoalOneController::class, 'destroy'])->name('goal1.destroy');

//1- structure change for database (create table , edit column , remove column)
//2- operations on database (insert record, edit record, delete record)

// routes for goal 1 meta data pages


Route::get('/goal1/{id}/show_meta', [GoalOneController::class, 'show_meta'])->name('goal1.show_meta');

Route::get('/goal1/{id}/edit_meta', [GoalOneController::class, 'edit_meta'])->name('goal1.edit_meta');

Route::put('/goal1/{id}/update_meta', [GoalOneController::class, 'update_meta'])->name('goal1.update_meta');


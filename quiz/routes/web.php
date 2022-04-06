<?php

use App\Http\Controllers\QuestionController;
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
    return view('start');
});

Route::get('/question_1', [QuestionController::class, 'question_1']);
Route::post('/question_1', [QuestionController::class, 'question_1']);

Route::get('/question_2', [QuestionController::class, 'question_2']);
Route::post('/question_2', [QuestionController::class, 'question_2']);

Route::get('/question_3', [QuestionController::class, 'question_3']);
Route::post('/question_3', [QuestionController::class, 'question_3']);

Route::get('/question_4', [QuestionController::class, 'question_4']);
Route::post('/question_4', [QuestionController::class, 'question_4']);

Route::get('/question_5', [QuestionController::class, 'question_5']);
Route::post('/question_5', [QuestionController::class, 'question_5']);

Route::get('/showRes', [QuestionController::class, 'showRes']);
Route::post('/showRes', [QuestionController::class, 'showRes']);

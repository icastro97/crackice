<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Questions\QuestionsController;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/verifyCode', [HomeController::class, 'verificarCodigo']);
Route::get('/importForm', [QuestionsController::class, 'formImport']);
Route::post('/import', [QuestionsController::class, 'importQuestions']);
Route::get('/get-products', [ProductController::class, 'getAllProducts']);


Route::post('/cart-add',    [CartController::class,'add'])->name('cart.add');

Route::get('/cart-checkout',[CartController::class,'cart'])->name('cart.checkout');

Route::post('/cart-clear',  [CartController::class,'clear'])->name('cart.clear');

Route::post('/cart-removeitem',  [CartController::class,'removeitem'])->name('cart.removeitem');

Route::get('/pay',[CartController::class,'pay'])->name('cart.checkout-pay');



Route::middleware(['verificarCodigo'])->prefix('questions')->controller(QuestionsController::class)->group(function() {
     Route::get('/index', 'index');
     Route::post('/setCategory', 'setCategory');
     Route::get('/levels', 'levels');
     Route::post('/setLevel', 'setLevel');
     Route::get('/questions', 'questions');
     Route::get('/getChallenge', 'getRandomChallenge');
     Route::get('/finishQuestions', 'finishQuestions');


});

<?php
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


use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\QuestionsController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/login2', function () {
    return view('login2');
});

Route::get('/signup2', function () {
    return view('signup2');
});
Route::get('//profile/{profile:Username}', function () {
    return view('profile');
});

Route::post('/signup', [SignupController::class, 'register']);
Route::post('/login2', [SignupController::class, 'login']);
Route::post('/logout', [SignupController::class, 'logout']);
Route::get('/userdashboard', [SignupController::class, 'dashboard'])->middleware('auth')->name('dashboard');



Route::get('/createQuiz/{create}', [QuestionsController::class, 'createQuiz'])->name('categories');
Route::get('/viewquestions/{post}', [QuestionsController::class, 'showQuiz'])->name('dashboard');
Route::post('/questions', [QuestionsController::class, 'questions']);

Route::post('/pagination-ajax', [QuestionsController::class, 'getmorequestions']);
Route::get('/questions', [QuestionsController::class, 'index']);
Route::post('/quiz/{user}', [QuestionsController::class, 'create']);
Route::get('/category/{category}', [QuestionsController::class, 'quizs']);
Route::post('/submit', [QuestionsController::class, 'mark']);
Route::get('/resultSummary', [QuestionsController::class, 'result'])->name('resultSummary');
Route::get('/categories', [QuestionsController::class, 'category'])->name('categories');


Route::get('/profile/{profile:Username}', [UserController::class, 'profile'])->name('profile');
Route::get('/analytics/{quizs:Username}', [UserController::class, 'analysis'])->name('analytics');
Route::post('/updateProfilePicture', [UserController::class, 'updateProfilePicture'])->name('profile');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TestsController;
use Illuminate\Support\Facades\Route;
//URL::forceScheme('https');
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



Route::middleware('auth')->group(function () {
    //Route::get('/chat', [ChatsController::class, 'index']);
    Route::get('/dashboard', [TeachersController::class, 'index'])->name('dashboard');
    Route::get('/tests', [TeachersController::class, 'tests'])->name('tests');
    Route::get('/tests/live', [TeachersController::class, 'testsLive'])->name('tests.live');
    Route::get('/tests/live/{id}', [TeachersController::class, 'testsLiveStudents'])->name('tests.live.students');
    Route::get('/test/detail/{id}', [TestsController::class, 'detail'])->name('test.detail');
    Route::get('/test/answers/{id}', [TestsController::class, 'answers'])->name('test.answers');
    Route::get('/test/student/answers/{id}', [TestsController::class, 'studentAnswers'])->name('test.student.answers');
    //Route::get('/create/test', [TeachersController::class, 'create'])->name('create.test');

    //API
    Route::post('/store/test', [TestsController::class, 'store']);


});

Route::get ('/', function () { return redirect('zaverecne_zadanie/login'); });
Route::post('/student/login', [StudentsController::class, 'login']);
Route::get ('/exam/{code}', [StudentsController::class, 'exam']);

require __DIR__.'/auth.php';


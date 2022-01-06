<?php

use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PotController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\sessionsController;
use App\Http\Controllers\NewsletterController;
use App\Models\Post;
use App\Services\Newsletter;
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

Route::post('newsletter', NewsletterController::class);

Route::get('/', [PotController::class, 'index']);

Route::get('/posts/{post:slug}', [PotController::class, 'show'])->where('post', '[A-z_\-]+');

// you should use ( index , show , create , store , edit , update , destroy)
Route::post('/posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [sessionsController::class, 'create'])->middleware('guest');

Route::post('sessions', [sessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [sessionsController::class, 'destroy'])->middleware('auth');


Route::get('admin/posts/create' , [PotController::class , 'create'])->middleware('admin');

Route::post('admin/posts' , [PotController::class , 'store'])->middleware('admin');

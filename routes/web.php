<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
   // $posts = Post::where('user_id', auth()->id())->get();
   $posts =  [];
   if(auth()->check()){         //check see if u are logged in or not
           // we created user instance in userController, we use latest to see latest post first.
    $posts = auth()->user()->usersPostss()->latest()->get();

   }
    return view('home', ['posts' => $posts]);  // these both arre variables. we could have done => Post::all()
});

Route::post('/register', [UserController::class, 'register']);
route::post('/logout', [UserController::class, 'logout']);
route::post('/login', [UserController::class, 'login']);
route::get('/register-user', [UserController::class, 'registerUser']);



//blogpost related routes
route::post('/create-post', [PostController::class, 'createPost']);
route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatedPost']);
route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);





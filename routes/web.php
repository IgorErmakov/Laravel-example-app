<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TodoController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Todo;


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
require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    $userId = Auth::id();
    return view('dashboard', compact('userId'));
//     Only authenticated users may access this route...
})->middleware('auth.basic');


Route::get('/dashboard', function (Request $request) {

    $userId = $request->user()->id;

    $message    = 'Yeah';
    $value      = 555;
    $inputValue = 'Goo';

    $componentName = 'forms.textarea';

    // ideally to use a service
//    $items = Todo::all();


    return view('dashboard', compact('userId', 'message', 'value', 'inputValue', 'componentName'));

//    return view('dashboard', compact('userId'));

})->middleware(['auth'])->name('dashboard');



Route::middleware(['auth'])->group(function() {

    Route::get('/create-form', [IndexController::class, 'createForm'])->name('create-form');
    Route::put('/create-form', [IndexController::class, 'saveForm'])->name('save-form');

    Route::get('/post/form', [PostsController::class, 'form'])->name('post-form');
    Route::put('/post', [PostsController::class, 'save'])->name('save-post');
});

Route::prefix('todo')->group(function (Illuminate\Routing\Router $router) {

    Route::get('/',                         [TodoController::class, 'index']);
    Route::get('/get-items',                [TodoController::class, 'getItems']);
    Route::post('/add',                     [TodoController::class, 'store']);
    Route::post('/toggle-completed/{todo}', [TodoController::class, 'toggleCompleted']);
    Route::delete('/delete/{id}',           [TodoController::class, 'delete']);
});




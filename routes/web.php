<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;


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

// Route::get('/', function () {
//     return view('frontpage.home', [
//         "title" => "Home"
//     ]);
// });

// Route::get('/about', function () {
//     return view('frontpage.about', [
//         "title" => "About"
//     ]);
// });

Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/categories', function () {
    return view('frontpage.categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
})->name('category.index');

Route::get('/posts/categories/{category:slug}', function (Category $category) {
    return view('frontpage.posts', [
        'title' => "Post By  Category : $category->name",
        'posts' => $category->posts->load('category', 'author')
    ]);
})->name('posts.category');

Route::get('/posts/authors/{author:username}', function (User $author) {
    return view('frontpage.posts', [
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category', 'author'),
    ]);
})->name('posts.author');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
});

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard.index', [
                'title' => 'Dashboard',
                'posts' => Post::paginate(7)->fragment('posts')
            ]);
        })->name('dashboard.index');
        Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
        Route::resource('/dashboard/posts', DashboardPostController::class);
        Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
    });
});

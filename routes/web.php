<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', \App\Http\Controllers\Main\HomeController::class)->name('main.index');

Route::group(['prefix'=>'categories'], function(){
    Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
    Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create');
    Route::post('/', \App\Http\Controllers\Category\StoreController::class)->name('category.store');
    Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit');
    Route::get('/{category}', \App\Http\Controllers\Category\ShowController::class)->name('category.show');
    Route::patch('/{category}', \App\Http\Controllers\Category\UpdateController::class)->name('category.update');
    Route::delete('/{category}', \App\Http\Controllers\Category\DeleteController::class)->name('category.delete');

});

Route::group(['prefix' => 'tags'], function (){
    Route::get('/', [\App\Http\Controllers\Tag\IndexController::class, 'index'])->name('tag.index');
    Route::get('/create', [\App\Http\Controllers\Tag\CreateController::class, 'create'])->name('tag.create');
    Route::post('/', [\App\Http\Controllers\Tag\StoreController::class, 'store'])->name('tag.store');
    Route::get('/{tag}/edit', [\App\Http\Controllers\Tag\EditController::class, 'edit'])->name('tag.edit');
    Route::get('/{tag}', [\App\Http\Controllers\Tag\ShowController::class, 'show'])->name('tag.show');
    Route::patch('/{tag}', [\App\Http\Controllers\Tag\UpdateController::class, 'update'])->name('tag.update');
    Route::delete('/{tag}', [\App\Http\Controllers\Tag\DeleteController::class, 'delete'])->name('tag.delete');
});

Route::group(['prefix' => 'colors'], function (){
    Route::get('/', [\App\Http\Controllers\Color\IndexController::class, 'index'])->name('color.index');
    Route::get('/create', [\App\Http\Controllers\Color\CreateController::class, 'create'])->name('color.create');
    Route::post('/', [\App\Http\Controllers\Color\StoreController::class, 'store'])->name('color.store');
    Route::get('/{color}/edit', [\App\Http\Controllers\Color\EditController::class, 'edit'])->name('color.edit');
    Route::get('/{color}', [\App\Http\Controllers\Color\ShowController::class, 'show'])->name('color.show');
    Route::patch('/{color}', [\App\Http\Controllers\Color\UpdateController::class, 'update'])->name('color.update');
    Route::delete('/{color}', [\App\Http\Controllers\Color\DeleteController::class, 'delete'])->name('color.delete');
});

Route::group(['prefix' => 'users'], function (){
    Route::get('/', [\App\Http\Controllers\User\IndexController::class, 'index'])->name('user.index');
    Route::get('/create', [\App\Http\Controllers\User\CreateController::class, 'create'])->name('user.create');
    Route::post('/', [\App\Http\Controllers\User\StoreController::class, 'store'])->name('user.store');
    Route::get('/{user}/edit', [\App\Http\Controllers\User\EditController::class, 'edit'])->name('user.edit');
    Route::get('/{user}', [\App\Http\Controllers\User\ShowController::class, 'show'])->name('user.show');
    Route::patch('/{user}', [\App\Http\Controllers\User\UpdateController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [\App\Http\Controllers\User\DeleteController::class, 'delete'])->name('user.delete');
});

Route::group(['prefix' => 'products'], function (){
    Route::get('/', [\App\Http\Controllers\Product\IndexController::class, 'index'])->name('product.index');
    Route::get('/create', [\App\Http\Controllers\Product\CreateController::class, 'create'])->name('product.create');
    Route::post('/', [\App\Http\Controllers\Product\StoreController::class, 'store'])->name('product.store');
    Route::get('/{product}/edit', [\App\Http\Controllers\Product\EditController::class, 'edit'])->name('product.edit');
    Route::get('/{product}', [\App\Http\Controllers\Product\ShowController::class, 'show'])->name('product.show');
    Route::patch('/{product}', [\App\Http\Controllers\Product\UpdateController::class, 'update'])->name('product.update');
    Route::delete('/{product}', [\App\Http\Controllers\Product\DeleteController::class, 'delete'])->name('product.delete');
});

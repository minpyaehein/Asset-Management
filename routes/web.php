<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;

Route::redirect('/', '/blogs');

Route::get('/blogs',[BlogsController::class,'index'])->name('blogsList');

Route::post('/blogs/create',[BlogsController::class,'create'])->name('blogsCreate');

Route::get('/blogs/{id}',[BlogsController::class,'delete'])->name('blogsDelete');

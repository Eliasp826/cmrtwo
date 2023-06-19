<?php

use App\Http\Livewire\Admin\Dashboard;
//use App\Http\Controllers\Admin\Dashboard1Controller;
use App\Http\Livewire\Admin\UserList;
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

//Route::get('/', function () {
  // return view('livewire.admin.dashboard');
//});

Route::get('/admin', Dashboard::class)
         ->name('admin.dashboard');

Route::get('/usuarios', UserList::class)
        ->name('admin.usuarios');

<?php

use App\Http\Livewire\Admin\Dashboard;
//use App\Http\Controllers\Admin\Dashboard1Controller;
use App\Http\Livewire\Admin\UserList;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\ClientManager;
use App\Http\Livewire\Project\ProjectManager;
use App\Http\Livewire\Project\CreateProject;
use App\Http\Livewire\Project\EditProject;
use App\Http\Livewire\Task\TaskManager;

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

Route::get('/dashboard', Dashboard::class)
         ->name('admin.dashboard');

Route::get('/usuarios', UserList::class)
        ->name('admin.usuarios');

//Route de clientes//
Route::get('/clientes', ClientManager::class)
    ->name('client.manager');

//Route de proyectos/
Route::get('/proyectos', ProjectManager::class)
    ->name('project.index');

//Route::get('/crear', CreateProject::class)
  //  ->name('project.create');

//Route::get('/editproject', EditProject::class)
  //  ->name('project.edit');

//Route de Tarea//
Route::get('/tarea', taskmanager::class)
    ->name('tarea.pendiente');

<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CamundaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstanceController;
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

Route::get('/', fn () => redirect('/dashboard'))->name('main');

// Route::get('/language/{locale}', function ($locale) {
//     app()->setLocale($locale);
//     session()->put('locale', $locale);

//     return redirect()->back();
// })->name('language');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('diagram.create');
    Route::post('/projects/create', [ProjectController::class, 'store'])->name('diagram.store');
    Route::post('/projects/import', [ProjectController::class, 'import'])->name('diagram.import');

    Route::get('/diagram/{uuid}', [EditorController::class, 'show'])->name('editor');
    Route::post('/diagram/{uuid}', [EditorController::class, 'deploy'])->name('deploy');
    Route::get('/diagram/{uuid}/preview.svg', [EditorController::class, 'preview'])->name('diagram.preview');
    Route::get('/diagram/{uuid}/file.{extension}', [EditorController::class, 'file'])->name('diagram.file');

    Route::get('/instances', [InstanceController::class, 'index'])->name('instances');
    Route::get('/instances/add', [InstanceController::class, 'create'])->name('instances.create');
    Route::post('/instances/add', [InstanceController::class, 'store'])->name('instances.store');
    Route::get('/instances/camunda/{id}', [InstanceController::class, 'show'])
        ->where('id', '[0-9]+')->name('instances.show');
    Route::put('/instances/camunda/{id}', [InstanceController::class, 'update'])
        ->where('id', '[0-9]+')->name('instances.update');
    Route::delete('/instances/camunda/{id}', [InstanceController::class, 'delete'])
        ->where('id', '[0-9]+')->name('instances.delete');
    Route::get('/instances/camunda/{id}/desicions', [InstanceController::class, 'desicions'])
        ->name('instances.desicions');
    Route::get('/instances/camunda/{id}/incidents', [InstanceController::class, 'incidents'])
        ->name('instances.incidents');
    Route::get('/instances/camunda/{id}/logs', [InstanceController::class, 'logs'])
        ->name('instances.logs');
    Route::get('/instances/camunda/{id}/settings', [InstanceController::class, 'settings'])
        ->name('instances.settings');
    Route::any('/instances/camunda/{id}/{request}', CamundaController::class)
        ->where('id', '[0-9]+')
        ->where('request', '.*')->name('instances.camunda');
});

Route::get('/management/health', fn () => response()->json([
    'status' => 'healthy',
    'app_version' => config('app.version'),
    'framework_version' => app()->version(),
    'app_enviroment' => App::environment()
]));

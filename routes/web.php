<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SitioController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\MessageContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\SupportController;

 Route::get('/', [HomeController::class, 'index'])->name('home');
 Route::get('/services', [HomeController::class, 'services'])->name('services');
 Route::get('/about', [HomeController::class, 'about'])->name('about');
 Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
 Route::get('/soporte', [HomeController::class, 'help'])->name('help');
 Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::get('/combi', function() {
    return view('welcome');
});
// Route::get('/inicio', function() {
//     return view('option');
// });

Route::post('/contact/store', [MessageContactController::class, 'store'])->name('contact.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'],)->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'],)->name('admin.users');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/show/{id}', [AdminController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/update/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/delete/{id}', [AdminController::class, 'delete'])->name('admin.users.eliminar');

    // Rutas de PF y Mensajes Contacto
    Route::get('/admin/m-contact', [MessageContactController::class, 'index'])->name('question');
    Route::get('/admin/m-contact/show/{id}', [MessageContactController::class, 'show'])->name('admin.question.show');
    Route::delete('/admin/m-contact/delete', [MessageContactController::class, 'delete'])->name('admin.question.delete');

    // page routes
    Route::get('/admin/paginas', [SitioController::class, 'index'])->name('admin.pages');
    Route::get('/admin/pages/create', [SitioController::class, 'create'])->name('admin.pages.create');
    Route::post('/admin/pages/store', [SitioController::class, 'store'])->name('admin.pages.store');
    Route::get('/admin/pages/show/{id}', [SitioController::class, 'show'])->name('admin.pages.show');
    Route::get('/admin/pages/edit/{id}', [SitioController::class, 'edit'])->name('admin.pages.edit');
    Route::post('/admin/pages/update/{id}', [SitioController::class, 'update'])->name('admin.pages.update');
    Route::delete('/admin/pages/delete/{id}', [SitioController::class, 'delete'])->name('admin.pages.eliminar');

    //home page controller CRUD
    Route::get('/admin/Phome/index', [SitioController::class, 'homeIndex'])->name('admin.home.index');
    Route::get('/admin/Phome/create', [SitioController::class, 'homeCreate'])->name('admin.home.create');
    Route::post('/admin/Phome/store', [SitioController::class, 'homeStore'])->name('admin.home.store');


    // Route::get('/admin/Phome/show', [AdminController::class, 'pageshow'])->name('admin.home.show');
    Route::get('/admin/Phome/edit/{id}', [SitioController::class, 'homeEdit'])->name('admin.home.edit');
    Route::post('/admin/Phome/update/{id}', [SitioController::class, 'homeUpdate'])->name('admin.home.update');
    Route::delete('/admin/Phome/delete/{id}', [SitioController::class, 'homeDelete'])->name('admin.home.delete');


    //SERVICE CONTROLLER

    Route::get('/admin/services/index', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services/store', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/show{id}', [ServiceController::class, 'show'])->name('admin.services.show');
    Route::get('/admin/services/edit/{id}', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::post('/admin/services/update/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/delete/{id}', [ServiceController::class, 'delete'])->name('admin.services.delete');


    // MESSAGE CRUD CONTROLLER

    Route::get('/admin/message', [MessageController::class, 'index'])->name('admin.message');
    Route::post('admin/message/store', [MessageController::class, 'store'])->name('admin.message.store');
    Route::get('admin/message/show/{id}', [MessageController::class, 'show'])->name('admin.message.show');
    Route::get('/admin/message/edit/{id}', [MessageController::class, 'edit'])->name('admin.message.edit');
    Route::post('/admin/message/update/{id}', [MessageController::class, 'update'])->name('admin.message.update');
    Route::delete('/admin/message/delete/{id}', [MessageController::class, 'destroy'])->name('admin.message.delete');


    //SOPORTE CONTROLLER
    Route::get('/admin/support', [SupportController::class, 'index'])->name('admin.support');
    Route::get('/admin/support/create', [SupportController::class, 'create'])->name('admin.support.create');
    Route::post('/admin/support/store', [SupportController::class, 'store'])->name('admin.support.store');
    Route::get('/admin/support/show/{id}', [SupportController::class, 'show'])->name('admin.support.show');
    Route::get('/admin/support/edit/{id}', [SupportController::class, 'edit'])->name('admin.support.edit');
    Route::post('/admin/support/update/{id}', [SupportController::class, 'update'])->name('admin.support.update');
    Route::delete('/admin/support/delete/{id}', [SupportController::class , 'destroy'])->name('admin.support.delete');
});




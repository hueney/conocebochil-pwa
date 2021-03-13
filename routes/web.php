<?php

use App\Http\Livewire\UserComponent;
use App\Http\Livewire\SupplierComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ProductComponent;
use App\Http\Livewire\ClickComponent;
use App\Http\Livewire\ConocebochilComponent;


use App\Http\Controllers\Dashboard;
use App\Http\Controllers\WepController;

use Illuminate\Support\Facades\Route;



Route::get('/', [WepController::class, 'index'])->name('inicio');

Route::get('/suppliers/{id}',  [WepController::class, 'suppliers'])->name('suppliers.index');

Route::get('/products/{id}',  [WepController::class, 'products'])->name('products.index');

Route::get('/whatsapp/{id}',  [WepController::class, 'whatsapp'])->name('whatsapp');

Route::get('/llamar/{id}',  [WepController::class, 'llamar'])->name('llamar');



Route::middleware(['auth:sanctum', 'verified', 'permission:dashboard_index'])
->get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'permission:users_index'])
->get('/cms-users', UserComponent::class)
->name('cms-users');

Route::middleware(['auth:sanctum', 'verified', 'permission:suppliers_index'])
->get('/cms-suppliers', SupplierComponent::class)
->name('cms-suppliers');

Route::middleware(['auth:sanctum', 'verified', 'permission:categories_index'])
->get('/cms-categories', CategoryComponent::class)
->name('cms-categories');

Route::middleware(['auth:sanctum', 'verified', 'permission:products_index'])
->get('/cms-products', ProductComponent::class)
->name('cms-products');

Route::middleware(['auth:sanctum', 'verified', 'permission:clicks_index'])
->get('/cms-clicks', ClickComponent::class)
->name('cms-clicks');




<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/', function () {
        return view('admin.admin-home');
    })->name('home');
    Route::get('/department', function () {
        return view('admin.layouts.pages.departments');
    })->name('departments');
    Route::get('/category', function () {
        return view('admin.layouts.pages.category');
    })->name('category');
    Route::get('/department-users', function () {
        return view('admin.layouts.pages.department-users');
    })->name('department-users');
    Route::get('/files', function () {
        return view('admin.layouts.pages.files');
    })->name('files');
    Route::get('/settings', function () {
        return view('admin.layouts.pages.settings');
    })->name('settings');
    Route::get('/department-report', function () {
        return view('admin.layouts.pages.department-report');
    })->name('department-report');
    Route::get('/status-report', function () {
        return view('admin.layouts.pages.status-report');
    })->name('status-report');
});
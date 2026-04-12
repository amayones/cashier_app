<?php

use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/',           fn() => view('public.landing'));
Route::get('/pricing',    fn() => view('public.pricing'));
Route::get('/login',      fn() => view('public.login'));
Route::get('/register',   fn() => view('public.register'));
Route::get('/onboarding', fn() => view('public.onboarding'));

// App pages
Route::get('/dashboard',          fn() => view('pages.dashboard.index'));
Route::get('/pos',                fn() => view('pages.pos.index'));
Route::get('/product',            fn() => view('pages.product.index'));
Route::get('/product/create',     fn() => view('pages.product.create'));
Route::get('/product/{id}/edit',  fn($id) => view('pages.product.edit', compact('id')));
Route::get('/inventory',          fn() => view('pages.inventory.index'));
Route::get('/report',             fn() => view('pages.report.index'));
Route::get('/user',               fn() => view('pages.user.index'));
Route::get('/settings',           fn() => view('pages.settings.index'));
Route::get('/shift',              fn() => view('pages.shift.index'));
Route::get('/supplier',           fn() => view('pages.supplier.index'));
Route::get('/tenant',             fn() => view('pages.tenant.index'));
Route::get('/subscription',       fn() => view('pages.subscription.index'));
Route::get('/profile',            fn() => view('pages.profile.index'));

<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('orgnz')->user();

    //dd($users);

    return view('orgnz.home');
})->name('home');

Route::get('/attend', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('orgnz')->user();

    //dd($users);

    return view('orgnz.pages.attend');
})->name('attend');

Route::get('/interest', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('orgnz')->user();

    //dd($users);

    return view('orgnz.pages.interest');
})->name('interest');

Route::get('/profile', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('orgnz')->user();

    //dd($users);

    return view('orgnz.pages.profile');
})->name('profile');

Route::get('/record', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('orgnz.pages.record');
})->name('record');

Route::get('/schedule', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('orgnz')->user();

    //dd($users);

    return view('orgnz.pages.schedule');
})->name('schedule');


Route::get('/create', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('orgnz')->user();

    //dd($users);

    return view('orgnz.pages.create');
})->name('create');

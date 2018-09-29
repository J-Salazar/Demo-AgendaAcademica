<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('orgnz')->user();

    //dd($users);

    return view('orgnz.home');
})->name('home');


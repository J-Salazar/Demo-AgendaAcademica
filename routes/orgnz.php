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

Route::post('/update', 'OrgnzAuth\EditProfileController@edit');

Route::get('/events', 'OrgnzAuth\ListEventController@list_event')->name('events');

Route::post('/create_event', 'OrgnzAuth\CreateEventController@create_event');

Route::get('/{orgnz_id}/event/{event_id}', 'OrgnzAuth\ListEventController@edit_event');

Route::post('/event/{event_id}/update', 'OrgnzAuth\ListEventController@update_event');

Route::get('/event/{event_id}/update', function ($event_id){
    $orgnz_id = Event::Find($event_id);
    return redirect('orgnz'.$orgnz_id.'/event/'.$event_id);
});
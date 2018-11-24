<?php

Route::get('/home', 'UserAuth\ActionController@home')->name('home');

Route::get('/attend', 'UserAuth\ActionController@attend')->name('attend');

Route::get('/interest', 'UserAuth\ActionController@interest')->name('interest');

Route::get('/profile', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('user')->user();

    //dd($users);

    return view('user.pages.profile');
})->name('profile');

Route::get('/record', 'UserAuth\ActionController@record')->name('record');

Route::get('/schedule', 'UserAuth\ActionController@schedule')->name('schedule');

Route::post('/update', 'UserAuth\EditProfileController@edit');

Route::get('/{user_id}/event_move/{event_id}/{interest}',
    'UserAuth\ActionController@move');

Route::get('/list', 'UserAuth\ActionController@list');

Route::get('/{user_id}/event_save/{event_id}/{interest?}',
            'UserAuth\ActionController@saveas'
    );

Route::get('/{event_id}/info','UserAuth\ActionController@eventinfo');


Route::get('/group/{event_group}','UserAuth\ActionController@eventgroup');
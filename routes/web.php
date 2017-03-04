<?php

Route::get('/', 'MainController@index');

Route::post('/', 'MainController@order')->name('muviorder');

Route::get('main/autor', function (){
    return view('Main.autor');
});

Route::get('main/contact', function (){
    return view('Main.contact');
});

Route::get('main/search', 'MainController@search_option');

Route::post('main/search', 'MainController@search')->name('muvisearch');

Route::get('main/add', 'MainController@add');

Route::post('main/add', 'MainController@store')->name('muvistore');

Route::delete('main/delete/{id}', function (\App\movie $id) {
    $id->delete();
    return redirect('/');
})->name('muviDelete');

Route::get('directors/index', 'DirectorController@index');

Route::get('directors/add', 'DirectorController@add');

Route::post('directors/add', 'DirectorController@store')->name('directorsstore');

Route::delete('directors/delete/{id}', function (\App\director $id) {
    $id->delete();
    return redirect('directors/index');
})->name('directorsDelete');

Route::get('studios/index', 'StudioController@index');

Route::get('studios/add', 'StudioController@add');

Route::post('studios/add', 'StudioController@store')->name('studiostore');

Route::delete('studios/delete/{id}', function (\App\studio $id) {
    dump($id);
    dump(\App\addres::query("DELETE FROM `addres` WHERE id = ",$id->id_Addres));
  $id->delete();
   //return redirect('studios/index');
})->name('studiosDelete');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

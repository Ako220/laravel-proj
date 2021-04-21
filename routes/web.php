<?php

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

Route::get('/', function () {
    return view('files');
});

Route::get('/client','ClientController@index');

Route::post('/clientbook','ClientController@store');

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale',$locale);
    return redirect()->back();
});
Route::resource('fileupload', 'FileuploadController');

Route::get('send', function() {
    $details = [
        'title'=>'Mail from Zalonix Salon',
        'body'=>'This is form testing email using smtp'
    ];
    \Mail::to('akzhan.shaptaeva02@gmail.com')->send(new \App\Mail\TestMail($details));
    echo "Email has been sent!";
});


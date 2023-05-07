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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::group(['middleware' => ['auth']], function() {
    // Home
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Admin
    Route::resource('/admin', 'AdminController');

    // Profile
    Route::resource('/profile', 'ProfileController');
   
    // Penginapan
    Route::resource('/penginapan', 'VillaController');
    Route::get('/cetak-penginapan', 'PrintController@printVilla')->name('cetak.penginapan');

    // Kriteria
    Route::resource('/kriteria/penerimaan', 'AcceptanceCriteriaController');
    Route::resource('/kriteria/jurusan', 'MajorCriteriaController');
    Route::resource('/kriteria/pendidikan', 'EducationCriteriaController');
    Route::resource('/kriteria/pengalaman', 'ExperienceCriteriaController');
    Route::resource('/kriteria/wawancara', 'InterviewCriteriaController');

    // Nilai
    Route::resource('/nilai', 'ResultController');
    Route::get('/cetak-nilai', 'PrintController@printResult')->name('cetak.nilai');

    // Hasil
    Route::get('/hasil', 'RankController@index')->name('hasil.index');
    Route::get('/hasil/refresh', 'RankController@refresh')->name('hasil.refresh');
    Route::get('/cetak-hasil', 'PrintController@printRank')->name('cetak.hasil');
});

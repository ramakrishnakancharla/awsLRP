<?php

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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*--------- Generic info tab ---------------*/
// Generic Family page
//Route::get('genericfamilydata','GenericInfoController@genericfamilydata')->name('genericfamilydata');
//Route::post('genericfamilydata','GenericInfoController@genericfamilydata_insert')->name('genericfamilydata_insert');
// Generic Friends page
//Route::get('genericfriendsdata','GenericInfoController@genericfriendsdata')->name('genericfriendsdata');
//Route::post('genericfriendsdata','GenericInfoController@genericfriendsdata_insert')->name('genericfriendsdata_insert');

Route::resource('genericinfofamily', 'GenericInfoFamilyController');
Route::resource('genericinfofriends', 'GenericInfoFriendsController');

/*------------General info tab ----------------*/
Route::get('personaldata','GeneralInfoController@personaldata')->name('personaldata');
Route::post('personaldata','GeneralInfoController@personaldata_insert')->name('personaldata_insert');
Route::get('personaldatadelete','GeneralInfoController@delete')->name('personaldatadelete');
//
Route::get('generalpersonaldata','GeneralInfoController@generalpersonaldata')->name('generalpersonaldata');
Route::post('generalpersonaldata','GeneralInfoController@generalpersonaldata_insert')->name('generalpersonaldata_insert');

Route::get('generaladdress','GeneralInfoController@generaladdress')->name('generaladdress');
Route::post('generaladdress','GeneralInfoController@generaladdress_insert')->name('generaladdress_insert');

Route::get('generalcommunications','GeneralInfoController@generalcommunications')->name('generalcommunications');
Route::post('generalcommunications','GeneralInfoController@generalcommunications_insert')->name('generalcommunications_insert');

Route::get('generalpersonalIds','GeneralInfoController@generalpersonalIds')->name('generalpersonalIds');
Route::post('generalpersonalIds','GeneralInfoController@generalpersonalIds_insert')->name('generalpersonalIds_insert');



Route::get('generaltravelinfo','GeneralInfoController@generaltravelinfo')->name('generaltravelinfo');
Route::post('generaltravelinfo','GeneralInfoController@generaltravelinfo_insert')->name('generaltravelinfo_insert');

Route::get('generalpersonaldocuments','GeneralInfoController@generalpersonaldocuments')->name('generalpersonaldocuments');
Route::post('generalpersonaldocuments','GeneralInfoController@generalpersonaldocuments_insert')->name('generalpersonaldocuments_insert');

Route::get('generalmemberships','GeneralInfoController@generalmemberships')->name('generalmemberships');

Route::get('generalobjectsonloan','GeneralInfoController@generalobjectsonloan')->name('generalobjectsonloan');
Route::get('generalleisureactivites','GeneralInfoController@generalleisureactivites')->name('generalleisureactivites');
Route::get('generalphotos','GeneralInfoController@generalphotos')->name('generalphotos');
Route::get('generalaccesslogin','GeneralInfoController@generalaccesslogin')->name('generalaccesslogin');




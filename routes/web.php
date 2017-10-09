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

Route::resource('genericinfofamily', 'GenericInfoFamilyController');
Route::resource('genericinfofriends', 'GenericInfoFriendsController');
Route::resource('general-personal-data', 'general\PersonalDataController');
Route::resource('general-address', 'general\AddressController');
Route::resource('general-communications', 'general\CommunicationsController');
Route::resource('general-personalIds', 'general\PersonalIDsController');
Route::resource('general-memberships', 'general\MembershipsController');
Route::resource('general-objectsonloan', 'general\ObjectsonloanController');
Route::resource('general-travelinfo', 'general\TravelinfoController');
Route::resource('general-personaldocuments', 'general\PersonaldocumentsController');
Route::resource('general-leisureactivites', 'general\LeisureactivitesController');
Route::resource('general-photos', 'general\PhotosController');
Route::resource('general-accesslogin', 'general\AccessloginController');

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

Route::get('financebankdetails','GeneralInfoController@financebankdetails')->name('financebankdetails');
Route::get('financensurances','GeneralInfoController@financensurances')->name('financensurances');
Route::get('financefixeddeposites','GeneralInfoController@financefixeddeposites')->name('financefixeddeposites');
Route::get('financeassets','GeneralInfoController@financeassets')->name('financeassets');
Route::get('financefinancialdocuments','GeneralInfoController@financefinancialdocuments')->name('financefinancialdocuments');
Route::get('financeloans','GeneralInfoController@financeloans')->name('financeloans');
Route::get('financerecurringdeposites','GeneralInfoController@financerecurringdeposites')->name('financerecurringdeposites');
Route::get('financechitfunds','GeneralInfoController@financechitfunds')->name('financechitfunds');
Route::get('financeequity','GeneralInfoController@financeequity')->name('financeequity');
Route::get('financemutualfund','GeneralInfoController@financemutualfund')->name('financemutualfund');
Route::get('financefutures','GeneralInfoController@financefutures')->name('financefutures');
Route::get('financeoptions','GeneralInfoController@financeoptions')->name('financeoptions');

Route::get('healthmedicalinfo','GeneralInfoController@healthmedicalinfo')->name('healthmedicalinfo');
Route::get('healthallergies','GeneralInfoController@healthallergies')->name('healthallergies');
Route::get('healthfamilydoctor','GeneralInfoController@healthfamilydoctor')->name('healthfamilydoctor');
Route::get('healthsurgeries','GeneralInfoController@healthsurgeries')->name('healthsurgeries');
Route::get('healthshorttermillness','GeneralInfoController@healthshorttermillness')->name('healthshorttermillness');
Route::get('healthlongtermillness','GeneralInfoController@healthlongtermillness')->name('healthlongtermillness');
Route::get('healthfitness','GeneralInfoController@healthfitness')->name('healthfitness');

Route::get('careeracedamics','GeneralInfoController@careeracedamics')->name('careeracedamics');
Route::get('careerprofessionaleducationskills','GeneralInfoController@careerprofessionaleducationskills')->name('careerprofessionaleducationskills');
Route::get('careertrainings','GeneralInfoController@careertrainings')->name('careertrainings');
Route::get('careerworkexperience','GeneralInfoController@careerworkexperience')->name('careerworkexperience');
Route::get('careerachievements','GeneralInfoController@careerachievements')->name('careerachievements');




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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('general-address/{id}/getStateList','general\AddressController@getStateList');
Route::get('general-address/{id}/getCityList','general\AddressController@getCityList');

/*------------Generic info tab ----------------*/
Route::resource('genericinfofamily', 'GenericInfoFamilyController');
Route::resource('genericinfofriends', 'GenericInfoFriendsController');

/*------------General info tab ----------------*/
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

/*-------------------------- Reports Tab-------------------*/
Route::resource('reports-myTask', 'reports\MyTaskController');
Route::resource('reports-calendar', 'reports\CalendarController');
Route::resource('reports-reminders', 'reports\RemindersController');
Route::resource('reports-profile', 'reports\ProfileController');
Route::resource('reports-family-tree', 'reports\FamilyTreeController');

/*------------Finance info tab ----------------*/
Route::resource('finance-bank-details', 'finance\FinanceBankController');
Route::resource('finance-insurance-details', 'finance\FinanceInsuranceController');
Route::resource('finance-fixed-deposits', 'finance\FinanceFixedDepositsController');
Route::resource('finance-asset', 'finance\FinanceAssetController');


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




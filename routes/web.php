<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProposalController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');



Route::resource('stands', App\Http\Controllers\StandController::class);



Route::resource('makes', App\Http\Controllers\MakeController::class);



Route::resource('carCategories', App\Http\Controllers\CarCategoryController::class);

Route::resource('carClasses', App\Http\Controllers\CarClassController::class);

Route::resource('carClasses', App\Http\Controllers\CarClassController::class);

Route::resource('carConditions', App\Http\Controllers\CarConditionController::class);

Route::resource('carDrives', App\Http\Controllers\CarDriveController::class);

Route::resource('carStates', App\Http\Controllers\CarStateController::class);

Route::resource('carTransmissions', App\Http\Controllers\CarTransmissionController::class);

Route::resource('carModels', App\Http\Controllers\CarModelController::class);


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
//Reoptimized class loader :
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// Route::get('/updateapp', function()
// {
//     Artisan::call('dump-autoload');
//     echo 'dump-autoload complete';
// });



Route::resource('proposalStates', App\Http\Controllers\ProposalStateController::class);

Route::resource('benefits', App\Http\Controllers\BenefitController::class);

Route::resource('businenssStudyAuthorizations', App\Http\Controllers\BusinenssStudyAuthorizationController::class);

Route::resource('businessStudies', App\Http\Controllers\BusinessStudyController::class);

Route::resource('benefitsBusinessStudies', App\Http\Controllers\BenefitsBusinessStudyController::class);





Route::resource('proposals', App\Http\Controllers\ProposalController::class);

Route::resource('financings', App\Http\Controllers\FinancingController::class);

Route::resource('financingProposals', App\Http\Controllers\FinancingProposalController::class);

Route::resource('carFuels', App\Http\Controllers\CarFuelController::class);


Route::resource('cars', App\Http\Controllers\CarController::class);
// Route::get( ['carController', 'getCars'])->name('getCars');
Route::get('/getcars', [CarController::class, 'getCars'])->name('getcars');
Route::get('/carstate/{car_id}/{state_id}', [CarController::class, 'carState'])->name('carstate');


Route::get('clients',[UserController::class, 'getClients'])->name('getClients');
Route::get('vendors',[UserController::class, 'getVendors'])->name('getVendors');
Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('campaigns', App\Http\Controllers\CampaignController::class);

Route::resource('benefitsProposals', App\Http\Controllers\BenefitsProposalsController::class);

Route::resource('campaignsProposals', App\Http\Controllers\CampaignsProposalsController::class);

Route::resource('clientTypes', App\Http\Controllers\ClientTypeController::class);

Route::resource('carClasses', App\Http\Controllers\CarClassController::class);


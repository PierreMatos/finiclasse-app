<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Resources\ClientResource as ClientResource;
use App\Http\Controllers\API\StandAPIController;
use App\Http\Controllers\API\CarAPIController;
use App\Http\Controllers\API\ProposalAPIController;

// use App\Http\Controllers\API\CarModelAPIController;
use App\Models\User as User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', App\Http\Controllers\API\UserAPIController::class);

// Route::get('/user', function () {

//     $user = User::find(1);

//     return new UserResource($user);
// });

// Route::get('/client', function () {

//     $client = User::find(1);

//     return new ClientResource($client);
// });

// Route::resource('cars', CarAPIController::class)->name('cars');
// Route::resource('cars', [CarAPIController::class])->name('stands');
Route::get('cars', [CarAPIController::class,'index']);
Route::get('proposals', [ProposalAPIController::class,'index']);

// Route::resource('stands', 'API\StandAPIController');
Route::get('/stands', [ StandAPIController::class, 'index'])->name('stands');

// Route::resource('stands', App\Http\Controllers\API\StandAPIController::class);



Route::resource('makes', App\Http\Controllers\API\MakeAPIController::class);

Route::resource('car_models', CarModelAPIController::class);

Route::resource('car_categories', App\Http\Controllers\API\CarCategoryAPIController::class);

Route::resource('car_classes', App\Http\Controllers\API\CarClassAPIController::class);

Route::resource('car_conditions', App\Http\Controllers\API\CarConditionAPIController::class);

Route::resource('car_drives', App\Http\Controllers\API\CarDriveAPIController::class);

Route::resource('car_states', App\Http\Controllers\API\CarStateAPIController::class);

Route::resource('car_transmissions', App\Http\Controllers\API\CarTransmissionAPIController::class);

Route::resource('proposal_states', App\Http\Controllers\API\ProposalStateAPIController::class);

Route::resource('benefits', App\Http\Controllers\API\BenefitAPIController::class);

Route::resource('businenss_study_authorizations', App\Http\Controllers\API\BusinenssStudyAuthorizationAPIController::class);

Route::resource('business_studies', App\Http\Controllers\API\BusinessStudyAPIController::class);

Route::resource('benefits_business_studies', App\Http\Controllers\API\BenefitsBusinessStudyAPIController::class);

// Route::resource('proposals', App\Http\Controllers\API\ProposalAPIController::class);
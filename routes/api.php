<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Resources\ClientResource as ClientResource;
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



Route::resource('cars', CarAPIController::class);

Route::post('addImage', [CarAPIController::class,'addImage']);

// Route::get('/stands', [ StandAPIController::class, 'index'])->name('stands');


Route::resource('makes', MakeAPIController::class);

Route::resource('car_models', CarModelAPIController::class);

Route::resource('car_categories', CarCategoryAPIController::class);

Route::resource('car_classes', CarClassAPIController::class);

Route::resource('car_conditions', CarConditionAPIController::class);

Route::resource('car_drives', CarDriveAPIController::class);

Route::resource('car_states', CarStateAPIController::class);

Route::resource('car_transmissions', CarTransmissionAPIController::class);

Route::resource('proposal_states', ProposalStateAPIController::class);

Route::resource('benefits', BenefitAPIController::class);
// Route::get('benefits', [App\Http\Controllers\API\BenefitAPIController::class,'index']);

Route::resource('businenss_study_authorizations', BusinenssStudyAuthorizationAPIController::class);

Route::resource('business_studies', BusinessStudyAPIController::class);

Route::resource('benefits_business_studies', BenefitsBusinessStudyAPIController::class);

Route::resource('proposals', ProposalAPIController::class);
// Route::resource('proposals', App\Http\Controllers\API\ProposalAPIController::class);

Route::resource('financings', FinancingAPIController::class);

Route::resource('financing_proposals', FinancingProposalAPIController::class);

Route::resource('car_fuels', CarFuelAPIController::class);

Route::resource('users', UserAPIController::class);
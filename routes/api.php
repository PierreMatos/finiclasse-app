<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\AuthController;
// use App\Http\Controllers\API\UserAPIController;
// use App\Http\Controllers\API\ProposalAPIController;
// use App\Http\Controllers\API\UserAPIController;
// use App\Http\Controllers\API\ProposalAPIController;
// use App\Http\Resources\UserResource as UserResource;
// use App\Http\Resources\ClientResource as ClientResource;
// use App\Models\User as User;

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


Route::post('register', 'UserAPIController@register');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);   
     
    // Route::post('after', [AuthController::class, 'dsa']);

});

// Route::group(['middleware' => ['role:admin']], function () {
Route::middleware('auth:api')->group(function () {

    Route::resource('makes', MakeAPIController::class);

    Route::resource('cars', CarAPIController::class);

    Route::get('clients', [App\Http\Controllers\API\UserAPIController::class, 'getClients']);
    //business study
    Route::get('businessstudy/{id}', [App\Http\Controllers\API\ProposalAPIController::class, 'businessStudy'])->name('businessstudy');


    Route::post('addImage', [CarAPIController::class,'addImage']);

    // Route::get('/stands', [ StandAPIController::class, 'index'])->name('stands');

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

    Route::resource('businenss_study_authorizations', BusinessStudyAuthorizationAPIController::class);

    Route::resource('business_studies', BusinessStudyAPIController::class);

    Route::resource('benefits_business_studies', BenefitsBusinessStudyAPIController::class);

    // Route::get('proposals', [ProposalAPIController::class,'store']);
    Route::resource('proposals', ProposalAPIController::class);
    // Route::resource('proposals', App\Http\Controllers\API\ProposalAPIController::class);

    Route::resource('financings', FinancingAPIController::class);

    Route::resource('financing_proposals', FinancingProposalAPIController::class);

    Route::resource('car_fuels', CarFuelAPIController::class);

    Route::resource('users', UserAPIController::class);

    Route::resource('campaigns', CampaignAPIController::class);

    Route::resource('benefits_proposals', BenefitsProposalsAPIController::class);
    
    Route::resource('campaigns_proposals', CampaignsProposalsAPIController::class);

    Route::resource('client_types', ClientTypeAPIController::class);

    // Validate RGPD with Email or SMS
    Route::POST('notify_rgpd', [App\Http\Controllers\API\UserAPIController::class, 'createValidateRGPD'])->name('notify_rgpd');

    Route::POST('/send_proposal/{id}', [App\Http\Controllers\API\ProposalAPIController::class, 'sendProposal'])->name('send_proposal');

});






Route::resource('business_study_states', App\Http\Controllers\API\BusinessStudyStatesAPIController::class);

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\FinancingController;

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

Auth::routes();

Route::group(['middleware' => ['role:admin|Administrador|Diretor comercial|Chefe de vendas']], function () {

    Route::get('/', [
        HomeController::class, 'index'
    ])->name('home');

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

    Route::resource('proposalStates', App\Http\Controllers\ProposalStateController::class);

    Route::resource('benefits', App\Http\Controllers\BenefitController::class);

    Route::resource('businenssStudyAuthorizations', App\Http\Controllers\BusinenssStudyAuthorizationController::class);

    Route::resource('businessStudies', App\Http\Controllers\BusinessStudyController::class);

    Route::resource('benefitBusinessStudies', App\Http\Controllers\BenefitsBusinessStudyController::class);

    Route::resource('proposals', App\Http\Controllers\ProposalController::class);

    Route::resource('financings', App\Http\Controllers\FinancingController::class);

    Route::resource('financingProposals', App\Http\Controllers\FinancingProposalController::class);

    Route::resource('carFuels', App\Http\Controllers\CarFuelController::class);

    Route::resource('cars', App\Http\Controllers\CarController::class);
    Route::get('new', [CarController::class, 'newCars'])->name('newCars');
    Route::post('new', [CarController::class, 'newCarsPost'])->name('newCarsPost');
    Route::post('new/update/{id}', [CarController::class, 'newCarsUpdate'])->name('newCarsUpdate');
    // Route::get( ['carController', 'getCars'])->name('getCars');
    Route::get('/getcars', [CarController::class, 'getCars'])->name('getcars');
    // Route::get('/carstate/{car_id}/{state_id}/{price}', [CarController::class, 'carState'])->name('carstate');
    Route::post('/carstate', [CarController::class, 'carState'])->name('carstate');

    Route::get('clients-list', [UserController::class, 'getClients'])->name('getClients');
    Route::get('sellers-list', [UserController::class, 'getSellers'])->name('getSellers');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('sellers', App\Http\Controllers\UserController::class);

    Route::resource('campaigns', App\Http\Controllers\CampaignController::class);

    Route::resource('benefitProposals', App\Http\Controllers\BenefitsProposalsController::class);

    Route::resource('campaignProposals', App\Http\Controllers\CampaignsProposalsController::class);

    Route::resource('clientTypes', App\Http\Controllers\ClientTypeController::class);

    Route::resource('carClasses', App\Http\Controllers\CarClassController::class);

    Route::resource('cars', App\Http\Controllers\CarController::class);
    Route::post('fetch-models', [CarController::class, 'fetchModel']);
    // Route::get( ['carController', 'getCars'])->name('getCars');
    Route::get('/getcars', [CarController::class, 'getCars'])->name('getcars');
    // Route::get('/carstate/{car_id}/{state_id}/{price}', [CarController::class, 'carState'])->name('carstate');
    Route::POST('/carstate', [CarController::class, 'carState'])->name('carstate');

    // Download
    Route::get('/download-financing{id}', [FinancingController::class, 'download']);
    Route::get('/download-campaign{id}', [CampaignController::class, 'download']);
    Route::get('/download-benefit{id}', [BenefitController::class, 'download']);

    // Validate Create RGPD with Email
    Route::get('createValidateRGPD/{id}', [UserController::class, 'createValidateRGPD'])->name('createValidateRGPD');

    // PDF
    Route::get('pdf/{id}', function ($id) {
        $user = App\Models\User::where('id', $id)->first();
        $pdf = PDF::loadView('pdf', ['user' => $user]);
        return $pdf->stream('pdf_rgpd.pdf');
    });

    // Infy0m

    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');

    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');
        // return what you want
    });
    //Reoptimized class loader :
    Route::get('/optimize', function () {
        $exitCode = Artisan::call('optimize');
        return '<h1>Reoptimized class loader</h1>';
    });
    //Route cache:
    Route::get('/route-cache', function () {
        $exitCode = Artisan::call('route:cache');
        return '<h1>Routes cached</h1>';
    });

    //Clear Route cache:
    Route::get('/route-clear', function () {
        $exitCode = Artisan::call('route:clear');
        return '<h1>Route cache cleared</h1>';
    });

    //Clear View cache:
    Route::get('/view-clear', function () {
        $exitCode = Artisan::call('view:clear');
        return '<h1>View cache cleared</h1>';
    });

    //Clear Config cache:
    Route::get('/config-cache', function () {
        $exitCode = Artisan::call('config:cache');
        return '<h1>Clear Config cleared</h1>';
    });
    
    Route::get('/mailable', function () {
        $proposal = App\Models\Proposal::find(600);
    
        return new App\Mail\ProposalOrder($proposal);
    });
});

// Validate Store RGPD with Email
Route::get('storeValidateRGPD/{id}', [UserController::class, 'storeValidateRGPD'])->name('storeValidateRGPD');

// Thankyou page
Route::get('thankyou', function () {
    return view('thankyou');
});
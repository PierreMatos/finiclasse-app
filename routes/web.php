<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\FinancingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WebNotificationController;

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

    Route::resource('businessStudyStates', App\Http\Controllers\BusinessStudyStatesController::class);

    Route::resource('BusinessStudyAuthorizations', App\Http\Controllers\BusinessStudyAuthorizationController::class);

    Route::resource('businessStudies', App\Http\Controllers\BusinessStudyController::class);

    Route::resource('benefitBusinessStudies', App\Http\Controllers\BenefitsBusinessStudyController::class);

    Route::resource('proposals', App\Http\Controllers\ProposalController::class);

    Route::resource('financings', App\Http\Controllers\FinancingController::class);

    Route::resource('financingProposals', App\Http\Controllers\FinancingProposalController::class);
    Route::post('/financing-remove', [App\Http\Controllers\FinancingProposalController::class, 'remove'])->name('financing.remove');

    Route::resource('carFuels', App\Http\Controllers\CarFuelController::class);

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
    Route::get('cars/create/{id}', [App\Http\Controllers\CarController::class, 'create'])->name('create');
    Route::post('fetch-models', [CarController::class, 'fetchModel']);
    Route::get('/getcars', [CarController::class, 'getCars'])->name('getcars');

    //Download
    Route::get('/download-financing{id}', [FinancingController::class, 'download']);
    Route::get('/download-campaign{id}', [CampaignController::class, 'download']);
    Route::get('/download-benefit{id}', [BenefitController::class, 'download']);

    //Validate Create RGPD with Email
    Route::get('createValidateRGPD/{id}', [UserController::class, 'createValidateRGPD'])->name('createValidateRGPD');

    //PDF
    Route::get('pdf/{id}', function ($id) {
        $user = App\Models\User::where('id', $id)->first();
        $pdf = PDF::setOption('enable-local-file-access', true)->loadView('pdf', ['user' => $user]);
        return $pdf->stream('pdf_rgpd.pdf');
    });

    //Infy0m

    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    //Mails Exemplos:
    if (!App::environment('production')) {
        //Proposta Comercial
        Route::get('/mailable', function () {
            $proposal = App\Models\Proposal::find(8);

            return new App\Mail\ProposalOrder($proposal);
        });

        Route::get('/mailable-pos', function () {
            $proposal = App\Models\Proposal::find("");

            return new App\Mail\ProposalOrder($proposal);
        });

        //RGPD
        Route::get('/mailable2', function () {
            $user = App\Models\User::find(14);

            return new App\Mail\ValidateRGPD($user);
        });

        //Notificação negócio para validação
        Route::get('/mailable3', function () {
            $proposal = App\Models\Proposal::find(8);

            return new App\Mail\ProposalApproval($proposal);
        });

        //Notificação retoma para validação
        Route::get('/mailable4', function () {
            $proposal = App\Models\Proposal::find(8);

            return new App\Mail\TradeInApproval($proposal);
        });
    }

    //Datatable Car
    Route::get('new-car', [CarController::class, 'indexNewCars'])->name('new-car');
    Route::post('store-car', [CarController::class, 'storeNewCars']);
    Route::post('edit-car', [CarController::class, 'editNewCars'])->name('edit-car');
    Route::post('delete-car', [CarController::class, 'destroyNewCar']);

    Route::patch('/businessAuthaction/{id}', [App\Http\Controllers\BusinessStudyController::class, 'businessAuth'])->name('businessAuthaction');

    //Finalizar proposta
    Route::patch('/closeProposal/{id}', [App\Http\Controllers\ProposalController::class, 'closeProposal'])->name('closeProposal');

    //Push Web Notification
    // Route::get('/push-notification', [WebNotificationController::class, 'index'])->name('push-notification');
    // Route::get('/allow', function () {
    //     return view('notifications.allow');
    // });
    Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
    // Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');

    //Notifications
    Route::post('/mark-as-read', [NotificationController::class, 'markNotification'])->name('markNotification');
});

//Support
Route::get('help-backoffice', function () {
    return view('help.backoffice');
});

//Support
Route::get('help-app', function () {
    return view('help.app');
});

//Validate Store RGPD with Email
Route::get('storeValidateRGPD/{id}', [UserController::class, 'storeValidateRGPD'])->name('storeValidateRGPD');

//Thankyou page
Route::get('thankyou', function () {
    return view('thankyou');
});

Route::post('/tradeinaction', [CarController::class, 'carState'])->name('tradeinaction');

//Apagar depois dos testes
Route::get('/send_proposal/{id}', [App\Http\Controllers\API\ProposalAPIController::class, 'sendProposal'])->name('send_proposal');

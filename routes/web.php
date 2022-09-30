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

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Proposal;

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

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');
    
    //Mails Exemplos:
    if (!App::environment('production')) {
        //Proposta Comercial
        Route::get('/mailable', function () {
            $proposal = App\Models\Proposal::find("");

            return new App\Mail\ProposalOrder($proposal);
        });

        Route::get('/mailable-pos', function () {
            $proposal = App\Models\Proposal::find("");

            return new App\Mail\ProposalOrder($proposal);
        });

        //RGPD
        Route::get('/mailable2', function () {
            $user = App\Models\User::find("");

            return new App\Mail\ValidateRGPD($user);
        });

        //Notificação negócio para validação
        Route::get('/mailable3', function () {
            // $proposal = App\Models\Proposal::find("");

            // return new App\Mail\ProposalApproval($proposal);

            $dt = Carbon::yesterday();

            $from = $dt->hour(7)->minute(0)->second(0)->toDateTimeString();
            $to = $dt->hour(21)->minute(0)->second(0)->toDateTimeString();
            $cars = Car::whereBetween('created_at', [$from, $to])->count();
    
            // $cars = Car::where('updated_at', '>=', Carbon::yesterday()->('21:30'))
            //             ->where('state_id', '=', 1)
            //             ->count();
    
            $users = User::where('created_at', '>=', Carbon::today())->count();
            $proposalsOpen = Proposal::query()->with('state')->where('state_id', '=', 1)->where('created_at', '>=', Carbon::today())->count();
            $proposalsClose = Proposal::query()->with('state')->where('state_id', '=', 2)->where('created_at', '>=', Carbon::today())->count();
    
            return view('mail.resumeDaily')
            ->with('from', $from)
            ->with('to', $to)
            ->with('users', $users)
            ->with('proposalsOpen', $proposalsOpen)
            ->with('proposalsOpenUsed', $proposalsOpenUsed)
            ->with('proposalsClose', $proposalsClose);


        });

        //Notificação retoma para validação
        Route::get('/mailable4', function () {
            $proposal = App\Models\Proposal::find("");

            return new App\Mail\TradeInApproval($proposal);
        });
    }

    //Datatable Car
    Route::get('new-car', [CarController::class, 'indexNewCars'])->name('new-car');
    Route::post('store-car', [CarController::class, 'storeNewCars']);
    Route::post('edit-car', [CarController::class, 'editNewCars'])->name('edit-car');
    Route::post('delete-car', [CarController::class, 'destroyNewCar']);

    Route::patch('/proposalrequestresponse/{id}', [App\Http\Controllers\BusinessStudyController::class, 'proposalRequestResponse'])->name('proposal_request_response');

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

    //Aceitar ou rejeitar retoma
    Route::post('/tradeinaction', [CarController::class, 'carState'])->name('tradeinaction');
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


Route::resource('profitMargins', App\Http\Controllers\ProfitMarginController::class);

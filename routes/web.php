<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::resource('users', App\Http\Controllers\UserController::class);

Route::resource('stands', App\Http\Controllers\StandController::class);

Route::resource('proposalStates', App\Http\Controllers\ProposalStatesController::class);

Route::resource('makes', App\Http\Controllers\MakeController::class);



Route::resource('carCategories', App\Http\Controllers\CarCategoryController::class);

Route::resource('carClasses', App\Http\Controllers\CarClassController::class);

Route::resource('carClasses', App\Http\Controllers\CarClassController::class);

Route::resource('carConditions', App\Http\Controllers\CarConditionController::class);

Route::resource('carDrives', App\Http\Controllers\CarDriveController::class);

Route::resource('carStates', App\Http\Controllers\CarStateController::class);

Route::resource('carTransmissions', App\Http\Controllers\CarTransmissionController::class);

Route::resource('carModels', App\Http\Controllers\CarModelController::class);

Route::resource('cars', App\Http\Controllers\CarController::class);
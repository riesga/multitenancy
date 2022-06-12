<?php

declare(strict_types=1);

use App\Http\Controllers\PassportController;
use App\Http\Controllers\UserController;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Database\Models\Domain;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Resolvers\DomainTenantResolver;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/


Route::middleware([
    'web',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->prefix('clientes')->group(function () {
    //dd(Tenant::all(), Domain::all());
    Route::get('/', function () {
       // dd(\App\Models\User::all());
       //dd(DomainTenantResolver::$currentDomain);
        return 'Esta es su aplicación multiusuario. El id del inquilino actual es el número' . tenant('id');
    });


    Route::get('/users', function () {
        return \App\Models\User::all();
    });


});


Route::middleware([
    'api',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
    ])->prefix('apicliente')->group(function () {
        Route::post('/registrar', [UserController::class, 'store']);
        Route::get('/usuarios', [UserController::class, 'index']);
        Route::post('register', [PassportController::class, 'register']);
        Route::post('login', [PassportController::class, 'login']);
});


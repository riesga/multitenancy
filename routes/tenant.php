<?php

declare(strict_types=1);

use App\Models\Tenant;
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
])->group(function () {
    //dd(Tenant::all(), Domain::all());
    Route::get('/', function () {
       // dd(\App\Models\User::all());
       //dd(DomainTenantResolver::$currentDomain);
        return 'This is your multi-tenant application. The id of the current tenant is the number ' . tenant('id');
    });
});

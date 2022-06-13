<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use App\Models\UserTenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return csrf_token();
        return Tenant::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|alpha_dash|unique:tenants|max:255',
            'domain' => 'required|string',
            'first_name' => 'required|string|max:255',
            'second_name' => 'string|max:255',
            'last_name' => 'required|string|max:255',
            'second_last_name' => 'max:255|string',
            'company' => 'required|string|max:255',
            'document_type' => 'required|integer',
            'tax_regime' => 'required|integer',
            'company_type' => 'required|string|max:1',
            'nit' => 'required|string|max:15',
            'check_digit' => 'required|integer',
            'ciiu' => 'required|string|max:10',
            'code_postal' => 'required|integer',
            'stratum' => 'required|integer',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'plan' => 'required|integer',
            'comments' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag();
        } else {
            $tenant = Tenant::firstOrNew(['id' => $request->id]);
            $tenant->domain = $request->domain;
            $tenant->save();

            $tenant->domains()->firstOrcreate(['domain' => $request->domain]);

            $user = User::firstOrNew(['email' => $request->email]);
            $user->first_name = $request->first_name;
            $user->second_name = $request->second_name;
            $user->last_name = $request->last_name;
            $user->second_last_name = $request->second_last_name;
            $user->company = $request->company;
            $user->document_type = $request->document_type;
            $user->tax_regime = $request->tax_regime;
            $user->company_type = $request->company_type;
            $user->nit = $request->nit;
            $user->check_digit = $request->check_digit;
            $user->ciiu = $request->ciiu;
            $user->code_postal = $request->code_postal;
            $user->stratum = $request->stratum;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->department = $request->department;
            $user->municipality = $request->municipality;
            $user->telephone = $request->telephone;
            $user->plan = $request->plan;
            $user->comments = $request->comments;
            $user->email = $request->email;
            $user->state = 1;
            $user->password = Hash::make($request->password);
            $user->save();

            $user = UserTenant::firstOrNew([
                'user' => $user->id,
                'tenant' => $tenant->id
            ]);
            $user->save();

            Artisan::call('tenants:seed', [
                '--tenants' => $tenant->id,
                '--class' => 'TenantSeeder',
            ]);

            return $tenant;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

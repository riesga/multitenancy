<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens as HasApiTokensPassport;  //add the namespace

class User extends Authenticatable
{
    use HasApiTokensPassport, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code_client',
        'first_name',
        'second_name',
        'last_name',
        'second_last_name',
        'company',
        'document_type',
        'tax_regime',
        'company_type',
        'nit',
        'check_digit',
        'ciiu',
        'code_postal',
        'stratum',
        'address',
        'country',
        'department',
        'municipality',
        'telephone',
        'plan',
        'comments',
        'email',
        'password',
        'state'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

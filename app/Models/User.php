<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    //el filizable permite guardar los datos a la bd
    protected $fillable = [
        'name',
        'email',
        'egresado_matricula',
        'password',
        'url',
    ];
    //protected $guarded =[];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //colocar foto de usuario
    public function adminlte_image(){
        return 'http://picsum.photos/300/300';
    }
     //muestra rol de usuario
    public function adminlte_desc()
    {
        return "Administrador";
    }

    //perfil de usuario
    public function adminlte_profile_url()
    {
        return '/datospersonales';
    }
}

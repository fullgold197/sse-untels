<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\MyResetPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    //el filizable permite guardar los datos a la bd
    public $table = "users"; // hace referencia a la tabla users de la bd
    public $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'egresado_matricula',
        'password',
        'url',
        'role_as',
        'estado',
        'estadocontrasena',

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
    //plantilla de mensaje por correo restablecer contraseña. MyResetPassword viene de la carpeta Notificactions/MyResetPassword.php

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }
}
